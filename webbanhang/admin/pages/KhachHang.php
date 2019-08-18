
  <div id="wrapper">
        <!-- Navigation -->

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý khách hàng</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>

                                    <th>STT</th>
                                        <th>Mã KH</th>
                                        <th>Tên khách hàng</th>
                                        <th>Địa chỉ</th>
                                        <th>Thành phố</th>
                                        <th>Số điện thoại</th>
                                        <th>Email</th>
                                        
                                        <th><a href="?mod=KhachHang_Them">Thêm</a></th>
                                    </tr>

                                </thead>
                                <tbody>
                                <?php								

                                $kq=mysqli_query($link,"select * from KhachHang");
                                $i=1;
								
                                while($dskh=mysqli_fetch_array($kq)) {

                                   
                                ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td>
                                           <?php echo $dskh['IDKhachHang']; ?>
                                        </td>
                                        <td><?php echo $dskh['TenKhachHang']; ?></td>
                                        <td ><?php echo $dskh['DiaChi']; ?></td>
                                        <td><?php echo $dskh['ThanhPho']; ?></td>
                                        <td><?php echo $dskh['SoDienThoai']; ?></td>
                                        <td><?php echo $dskh['Email']; ?></td>
                                       
                                        <td><a onclick="return confirm('Bạn có muốn xóa không!');" href="pages/process.php?KachHang_Xoa=<?php echo $dskh['IDKhacHang']; ?>">Xóa</a>|
                                         <a href="?mod=KhachHang_Sua&idhd=<?php echo $dskh['IDKhacHang'];?>">Sửa</a>|
                                         
                                         </a>
                                        
                                         </td>
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


                                     
                                        


                                      

