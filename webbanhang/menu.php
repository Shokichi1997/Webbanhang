<div class="menu">
    <?php include('connected.php');
    $sql = mysqli_query($link, 'SELECT * FROM chungloai'); ?>
    <ul>
        <?php while ($row = mysqli_fetch_array($sql)) { ?>
            <a href="sanpham.php?idCL=<?php echo $row['IDChungLoai']; ?>" class="linksp" style="display: block">
                <li class="sup-menu"><img src="images/icon/<?php echo $row['icon']; ?>"
                                          class="icon-menu"/><?php echo $row['TenChungLoai']; ?>
                    <div class="arrow-right"></div>
                    <ul class="sub-menu">
                        <?php
                        $loai = mysqli_query($link, "SELECT * FROM loai WHERE IDChungLoai = {$row['IDChungLoai']}");
                        while ($rowsub = mysqli_fetch_array($loai)) {?>
                            <a href="sanpham.php?idCL=<?php echo $row['IDChungLoai']; ?>&&idLoai=<?php echo $rowsub['IDLoai'] ?>">
                                <li><?php echo $rowsub['TenLoai']; ?></li>
                            </a>
                        <?php } ?>
                    </ul>
                </li>
            </a>
        <?php } ?>
    </ul>
</div>
