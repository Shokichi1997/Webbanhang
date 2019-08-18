
          <ul class="nav navbar-top-links navbar-right">
              <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links --><!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">

<div class="container">   
       
  <table class="table table-hover" style="width:80%">
    <thead>
      <tr>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Gia bán</th>
        <th>Thành tiền</th>
        <td>Sửa</td>
        <td>Xóa</td>
      </tr>
    </thead>
    <tbody>
    <?php
	$link2=mysqli_connect("localhost","root","","webbanhang");
    mysqli_query($link2,"set names 'utf8'");
    $idhd=$_GET['idhd'];
	$sql="Select *from CTHoaDon Where IDHoaDon='$idhd' ";
	
	$exec=mysqli_query($link2,$sql);
	
	$tt=0;
	While($dscthd=mysqli_fetch_array($exec)){
		$tt+=$dscthd['DonGia'];
		$sql2="Select *from sanpham Where IDSanPham='{$dscthd['IDSanPham']}' ";
		$exec2=mysqli_query($link2,$sql2);
		$sp=mysqli_fetch_array($exec2);
	?>
    
      <tr>
        <td><?php echo $sp['TenSanPham'];?></td>
        <td><?php echo $dscthd['SoLuong'];?></td>
        <td><?php echo $dscthd['Gia'];?></td>
        <td><?php echo $dscthd['DonGia'];?></td>
        <td><a>Sửa</a></td>
        <td><a>Xóa</a></td>
      </tr>
    <?php }?>
    </tbody>
  </table>
  <label>Tổng tiền: 
  <?php 
	echo $tt;
  ?>
  </label>
 </div>
 </div>
       