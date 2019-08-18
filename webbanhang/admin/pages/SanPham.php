
    <div id="wrapper">

        <!-- Navigation -->

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý sản phẩm</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="get" name="form1">
                                <input type="hidden" value="SanPham" name="mod"/>
                                <div class="form-group" style="width: 400px;">
                                <label>Chủng Loại:</label>
                                <select name="CLoai" onchange="form1.submit();" class="form-control">
                                    <?php
                                    $kqCL=mysqli_query($link,"SELECT * FROM `chungloai`  ");
                                    $idCL=0;

                                    if(isset($_GET['idLoai'])) {
                                        $kq = mysqli_query($link, "select * from loai where IDLoai={$_GET['Loai']}");
                                        $d=mysqli_fetch_array($kq);
                                        $idCL=$d['IDChungLoai'];
                                    }

                                    if(isset($_GET["CLoai"])) $idCL=$_GET['CLoai'];
                                    while($dCL=mysqli_fetch_array($kqCL)) {
                                        if($idCL==0) $idCL=$dCL['IDChungLoai'];
                                    ?>
                                    <option <?php if($idCL==$dCL["IDChungLoai"]) echo "selected='selected'"; ?> value="<?php echo $dCL["IDChungLoai"]; ?>" ><?php echo $dCL["TenChungLoai"]; ?></option>
                                    <?php } ?>
                                </select>
                                </div>

                                <div class="form-group" style="width: 400px;">
                                    <label>Loại:</label>
                                <select name="Loai" onchange="form1.submit();" class="form-control">
                                    <?php
                                    $kqL=mysqli_query($link,"select * from loai where IDChungLoai=$idCL");
                                    $idLoai=0;
                                    $k=0;
                                    while($dL=mysqli_fetch_array($kqL)) {
                                        if($idLoai==0) $idLoai=$dL['IDLoai'];
                                    ?>
                                    <option <?php if(isset($_GET['Loai']) && $_GET['Loai']==$dL['IDLoai']){ echo "selected='selected'"; $k=1; }?> value="<?php echo $dL['IDLoai']; ?>"><?php echo $dL['TenLoai']; ?></option>
                                    <?php } ?>
                                </select>
                                </div>
                            </form>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>

                                    <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Tên loại</th>
                                        <th>Tên nhà CC</th>
                                        <th>Giá gốc</th>
                                        <th>Giá bán</th>
                                        <th>Số lượng</th>
                                        <th><a href="?mod=SanPham_Them">Thêm</a></th>
                                    </tr>

                                </thead>
                                <tbody>
                                <?php
                                if($k==1) $idLoai=$_GET['Loai'];

                                $kqSP=mysqli_query($link,"select * from sanpham where IDLoai=$idLoai");
                                $i=1;
                                while($dSP=mysqli_fetch_array($kqSP)) {

                                    $kqL=mysqli_query($link,"select * from loai where IDChungLoai={$dSP['IDLoai']}");
                                    $dL=mysqli_fetch_array($kqL);
                                    $kqNCC=mysqli_query($link,"select * from nhacungcap where IDNhaCungCap={$dSP['IDNhaCungCap']}");
                                    $dNCC=mysqli_fetch_array($kqNCC);
                                ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $dSP['TenSanPham']; ?></td>
                                        <td><?php echo $dL['TenLoai']; ?></td>
                                        <td ><?php echo $dNCC['TenNhaCungCap']; ?></td>
                                        <td><?php echo $dSP['GiaNhapHang']; ?></td>
                                        <td><?php echo $dSP['GiaGoc']; ?></td>
                                        <td><?php echo $dSP['SoLuong']; ?></td>
                                        <td><a onclick="return confirm('Bạn có muốn xóa không!');" href="pages/process.php?SP_xoa=<?php echo $dSP['IDSanPham']; ?>">Xóa</a>|
                                            <a href="?mod=SanPham_Sua&idSP=<?php echo $dSP['IDSanPham']; ?>&idLoai=<?php echo $dSP['IDLoai']; ?>">Sửa</a></td>
                                    </tr>
                                <?php } ?>


                                </tbody>
                            </table>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row --><!-- /.row --><!-- /.row -->
            <div class="row"><!-- /.col-lg-6 --><!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

