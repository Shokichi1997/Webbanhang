<?php
if(isset($_GET['idhd']))
{
     $idhd=$_GET['idhd'];
   
    $kqhd=mysqli_query($link,"select * from HoaDon where IDHoaDon=$idhd");
    $dshd=mysqli_fetch_array($kqhd);
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
                    <h1 class="page-header">Sửa hóa đơn</h1>
                </div>
                <!-- /.col-lg-12 -->

                <form action="pages/process.php" method="post" enctype="multipart/form-data" >
                    <input type="hidden" name="IDHoaDon" value="<?php  echo $idhd; ?>"/>                   
                <div style="width: 500px">

                    <div class="form-group">
                        <label>IDKhachHang:</label>
                        <input class="form-control" name="IDKhachHang"  value="<?php echo $dshd['IDKhachHang'] ?>" />
                    </div>
                    
                    <div class="form-group">
                        <label>Tổng tiền:</label>
                        <input class="form-control" name="TongTien" value="<?php echo $dshd['TongTien'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ giao hàng:</label>
                        <input class="form-control" name="DiaChiGiaoHang"  value="<?php echo $dshd['DiaChiGiaoHang'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại:</label>
                        <input class="form-control" name="SoDienThoai"  value="<?php echo $dshd['SoDienThoai'] ?>" />
                    </div>
                      <div class="form-group" style="width: 400px">
                        <label>Trạng thái:</label>
                        <select class="form-control" name="TrangThai">
                            <option>Đang chờ duyệt</option>
                            <option>Đã phê duyệt</option>
                            <option>Đang giao hàng</option>
                            <option>Đã giao</option>
                        </select>
                    </div>
                </div>
                    <input class="btn btn-success" type="submit" value="Sửa" name="HD_Sua"/>
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

