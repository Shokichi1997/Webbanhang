<!--Code quảng cáo-->
<?php include ('connected.php');?>
<script type="text/javascript" src="public/js/jquery-3.3.1.min.js"></script>
<div class="quangcao-header"></div>

<!--Code Khung chứa logo mà mục chọn-->
<div class="header-1"> <a href="index.php"><img id="logo" name="logo" alt="logo" src="images/logo.png"/></a>
  <form action="timkiem.php" method="get" id="form-Search">
    <input type="text" class="txtTimKiem" name="search-box" placeholder="Nhập từ khóa tìm kiếm..."/>
    <button id="btnSearch" type="submit"><img src="images/search.png" width="40px" height="40px"/></button>
  </form>
  <div class="box"><img src="images/ttdonhang.png" class="icon"/>Theo dõi đơn hàng</div>
    <div class="box"><?php if(isset($_SESSION['username'])){?><a href="khachhang.php" class="xoaDinhDangLink"><?php }?><div id="icon-tbao"><div id="soThongBao">
            <?php if(isset($_SESSION['username'])){
                $sql = "select * from thongbao";
                $tt = mysqli_query($link,$sql);
                echo mysqli_num_rows($tt);
            }else echo 0;?>
            </div><img src="images/thongBao.png" class="icon"/></div>Thông báo của tôi<?php if(isset($_SESSION['username'])){?></a><?php }?> </div>
    <?php if(!isset($_SESSION['username'])){?>
  <div class="box" id="hover-dangnhap"><img src="images/account.png" class="icon"/>Đăng nhập
    <div class="arrow-top"></div>
    <ul class="sub-menu">
      <li id="dangnhap">Đăng nhập</li>
      <li id="dangky">Tạo tài khoản</li>
    </ul>
  </div>
    <?php }else{
        $sql_layTK = "select TenHienThi from taikhoan where EmailDN = '{$_SESSION['username']}'";
        $res = mysqli_query($link,$sql_layTK);
        if(!$res)
            echo 'Khong doc duoc';
        $row = mysqli_fetch_array($res);
        ?>

        <div class="box" id="da-dangnhap" style="display: block"><img src="images/account.png" class="icon"/>Chào <div id="nameKH"><?php echo $row[0];?></div>
  	<div class="arrow-top"></div>
    <ul class="sub-menu">
      <a href="khachhang.php"> <li id="taikhoan">Tài khoản của tôi</li></a>
      <a href="xuLyLog.php?dangxuat=yes"><li id="dangky">Đăng xuất</li></a>
    </ul>
  </div>
  <?php }?>
  <div class="box" id="boxGioHang"><div id ="imgCart">
  <a href="giohang.php" >
  <img src="images/cart.png" class="icon"/>Giỏ hàng
  </div><div id="soLuongHang"><?php
  if(!isset($_SESSION['giohang'])){
	   echo 0;
	  }
	  else
  echo count($_SESSION['giohang'])
  ?></div>
  </div>
  </a>
</div>

<!--Thông tin thêm và tiêu đề danh mục-->
<div class="header-2">
  <div class="box"><img src="images/danhmuc.png"  />DANH MỤC SẢN PHẨM</div>
  <div class="box"><a href="#"><img src="images/icon/loiich.png" />Lợi ích mua hàng</a></div>
  <div class="box"><a href="#"><img src="images/icon/sale.png" />Ưu đãi đặc biệt</a></div>
  <div class="box"><a href="#"><img src="images/icon/huongdanmua.png" /> Hướng dẫn mua hàng</a></div>
  <div class="box"><a href="#"><img src="images/icon/fastdelivery.png" />Giao hàng cấp tốc</a></div>
</div>

<!--Trang đăng ký, đăng nhập, lấy lại mật khẩu popup-->
<?php include("logon.php");?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#thongBaoKH-btn").click(function () {
            //window.location.href = 'khachhang.php';
            $("#thongBaoKH").trigger('click');
        });
    });
</script>
