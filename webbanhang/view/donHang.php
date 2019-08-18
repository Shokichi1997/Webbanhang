<?php session_start();?>
<link href="../public/css/CSSCoban.css" rel="stylesheet" type="text/css"/>
<?php
include "../connected.php";
include "../controller/control.php";

if(isset($_SESSION['username'])){
    $Email = $_SESSION['username'];
}
?>
<div class="donHang">
    <table>
        <tr>
            <th>Mã đơn hàng</th>
            <th>Ngày mua</th>
            <th>Sản phẩm</th>
            <th>Tổng tiền</th>
            <th>Trạng thái đơn hàng</th>

        </tr>
        <?php
            $result = getHoaDon($link,$Email);
            while ($row = mysqli_fetch_array($result)){
                $ctHoaDon = getCTHoaDon($link,$row['IDHoaDon']);
                $ct = mysqli_fetch_array($ctHoaDon);
                echo '<tr >';
                echo '<td style="text-align: center;">'.$row['IDHoaDon'].'</td>';
                echo '<td>'.$row['NgayLap'].'</td>';
                $IDSanPham = $ct['IDSanPham'];
                $tensp = getTenSP($link,$row['IDHoaDon'],$IDSanPham);
                $sl = mysqli_num_rows($ctHoaDon);
                echo '<td>'.$tensp;
                if($sl>1){
                    echo '... và '.$sl.' sản phẩm khác';
                }
                echo '</td>';
                echo '<td>'.$row['TongTien'].'</td>';
                echo '<td>'.$row['TrangThai'].'</td>';
            }
        ?>
    </table>
</div>