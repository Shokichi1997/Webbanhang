<?php

//$numSP = 8;
$soTrang = 5;
$result = mysqli_query($link, $sql);
$sumSP = mysqli_num_rows($result);
$tongPage = ceil($sumSP / $numSP);
$tongNhom = ceil($tongPage / $soTrang);

if (isset($_GET['page']) && !isset($_POST['check'])) {
    $page = $_GET['page'];
    $nhomHT = ceil($page / $soTrang);
} else if (isset($_GET['nhom']) && !isset($_POST['check'])) {
    $nhomHT = $_GET['nhom'];
    $page = ($nhomHT - 1) * $soTrang + 1;
} else
    $nhomHT = $page = 1;

$dau = ($nhomHT - 1) * $soTrang + 1;
$cuoi = $nhomHT * $soTrang;

if ($nhomHT == $tongNhom) {
    if ($tongPage < $cuoi) {
        $cuoi = $tongPage;
    }
}

$vitri = ($page - 1) * $numSP;
$sl = $sql . " limit $vitri,$numSP";

$pt = mysqli_query($link, $sl);


while ($row = mysqli_fetch_array($pt)) { ?>
    <a class="sanPham" href="chitietsp.php?idSP=<?php echo $row['IDSanPham']; ?>">
        <img src="images/products/<?php echo $row['Hinh']; ?>" class="img-sanPham"/>
        <div class="title-sp"><?php echo $row['TenSanPham']; ?></div>
        <div class="danhGia-star">
            <div class="rateit"></div>
        </div>
        <div class="giaSanPham">
            <div class="gia-giamgia"><?php echo $row['GiaGoc'] - $row['GiaGoc'] * $row['GiamGia']; ?></div>
            <div class="gia-goc"><?php echo $row['GiaGoc']; ?></div>
            <div class="phanTram-giamgia">-<?php echo $row['GiamGia'] * 100; ?>%</div>
        </div>
        <div class="tinhTrang">
            <?php if ($row['SoLuong'] > 5) {
                echo 'Tình trạng: Còn hàng';
            } else echo 'Còn lại:' . $row['SoLuong'] . ' sản phẩm'; ?>
        </div>
    </a>
<?php } ?>

<!------------------------Phân trang---------------------------------->
<div class="phanTrang" style="float: right;">
    <?php
    if($tongPage>1){
        if ($nhomHT > 1) {
            echo '<span class="node-chuaChon"><a href="?nhom=' . ($nhomHT - 1) . '"> << </a></span>';
        }
        for ($i = $dau; $i <= $cuoi; $i++) {
            if ($i == $page) echo '<span class="duocChon">' . $i . '&nbsp;</span>';
            else echo '<span class="node-chuaChon"><a href="?page=' . $i . '&&nhom=' . ceil($page / $soTrang) . '">' . $i . '&nbsp</a></span>';
        }
        if ($nhomHT < $tongNhom) {
            echo '<span class="node-chuaChon"><a href="?nhom=' . ($nhomHT + 1) . '"> >> </a></span>';
        }
    }

    ?>
</div>

