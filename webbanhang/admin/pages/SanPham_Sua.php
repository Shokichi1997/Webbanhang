<?php
if(isset($_GET['idSP']))
{
    $idLoai=$_GET['idLoai'];
    $idSP=$_GET['idSP'];
    $kqL=mysqli_query($link,"select * from loai where IDLoai=$idLoai");
    $dL=mysqli_fetch_array($kqL);
    $kqSP=mysqli_query($link,"select * from sanpham where IDSanPham=$idSP");
    $dSP=mysqli_fetch_array($kqSP);
?>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          <ul class="nav navbar-top-links navbar-right">
              <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links --><!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa sản phẩm</h1>
                </div>
                <!-- /.col-lg-12 -->

                <form method="get" name="form1">
                    <input type="hidden" value="SanPham_Them" name="mod"/>
                    <div class="form-group" style="width: 400px">
                        <label>Chủng Loại:</label>
                        <select name="CLoai" onchange="form1.submit();" class="form-control">
                            <?php
                            $kqCL=mysqli_query($link,"SELECT * FROM `chungloai`  ");
                            $idCL=0;
                            if(isset($_GET["CLoai"])) $idCL=$_GET['CLoai'];
                            if(isset($_GET['idLoai'])) $idCL=$dL['IDChungLoai'];
                            while($dCL=mysqli_fetch_array($kqCL)) {
                                if($idCL==0) $idCL=$dCL['IDChungLoai'];
                                ?>
                                <option <?php if($idCL==$dCL["IDChungLoai"]) echo "selected='selected'"; ?> value="<?php echo $dCL["IDChungLoai"]; ?>" ><?php echo $dCL["TenChungLoai"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                </form>

                <form action="pages/process.php" method="post" enctype="multipart/form-data" >
                    <input type="hidden" name="idSP" value="<?php  echo $idSP; ?>"/>
                    <div class="form-group" style="width: 400px">
                        <label>Loại:</label>
                        <select name="idLoai"  class="form-control">
                            <?php
                            $kqL=mysqli_query($link,"select * from loai where IDChungLoai=$idCL");
                            while($dL=mysqli_fetch_array($kqL)) {
                                ?>
                                <option <?php if($idLoai==$dL['IDLoai']) echo "selected='selected'"; ?> value="<?php echo $dL['IDLoai']; ?>"><?php echo $dL['TenLoai']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group" style="width: 400px" >
                        <label>Nhà cung cấp:</label>
                        <select class="form-control" name="idNCC">
                            <?php

                                $kqNCC=mysqli_query($link,"select * from nhacungcap");
                                while($dNCC=mysqli_fetch_array($kqNCC)) {
                            ?>
                            <option <?php if($dSP['IDNhaCungCap']==$dNCC['IDNhaCungCap']) echo "selected='selected'"; ?> value="<?php echo $dNCC['IDNhaCungCap']; ?>"><?php echo $dNCC['TenNhaCungCap']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                <div style="width: 500px">

                    <div class="form-group">
                        <label>Tên sản phẩm:</label>
                        <input class="form-control" name="TenSanPham"  value="<?php echo $dSP['TenSanPham'] ?>" />
                    </div>
                    <div class="form-group">
                        <img src="img/<?php echo $dSP['Hinh']; ?>" width="200px" height="150px" /><br/>
                        <input type="hidden" name="Hinh_cu" value="<?php echo $dSP['Hinh']; ?>"/>
                        <label>Hình:</label>
                        <input class="form-control" name="Hinh"  type="file" />
                    </div>
                    <div class="form-group">
                        <label>Giá nhập hàng:</label>
                        <input class="form-control" name="GiaNhapHang" value="<?php echo $dSP['GiaNhapHang'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>Giá gốc:</label>
                        <input class="form-control" name="GiaGoc"  value="<?php echo $dSP['GiaGoc'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>Số lượng:</label>
                        <input class="form-control" name="SoLuong"  value="<?php echo $dSP['SoLuong'] ?>" />
                    </div>
                </div>
                    <input class="btn btn-success" type="submit" value="Sửa" name="SP_Sua"/>
                </form>
            </div>
            <!-- /.row --><!-- /.row --><!-- /.row --><!-- /.row --><!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
<?php } ?>

