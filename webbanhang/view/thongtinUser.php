<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thông tin khách hàng</title>
    <link href="../public/css/CSSCoban.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<div class="thongtin-hien">
    <?php include ("../model/User.php");
    $KhachHang = new User();
    $link = mysqli_connect("localhost","root","","webbanhang");
    mysqli_query($link,"set names 'utf8'");
    $Email = $_SESSION['username'];
    $KhachHang->getDuLieu($link,$Email);

    ?>
    <div class="tieude-user">Thông tin của bạn</div>
    <form name="formUser" method="post" action="khachhang.php">
        <div class="lblNhan-cus"><label for="name" >Họ và tên: </label></div>
        <div class="txtNhap-cus"><input type="text" id="name" value="<?php echo $KhachHang->getTenKhachHang();?>"/></div><br/>
        <div class="lblNhan-cus"> <label for="diachi" >Địa chỉ: </label></div>
        <div class="txtNhap-cus"> <input type="text" id="diachi" value="<?php echo $KhachHang->getDiaChi();?>"/></div><br/>
        <div class="lblNhan-cus"><label for="thanhpho">Thành phố: </label></div>
        <div class="txtNhap-cus"> <input id="thanhpho" value="<?php echo $KhachHang->getThanhPho();?>"/></div><br/>
        <div class="lblNhan-cus"><label for="sdt" >Số điện thoại: </label></div>
        <div class="txtNhap-cus"> <input type="text" id="sdt" value="<?php echo $KhachHang->getSoDienThoai();?>"/></div><br/>
        <div class="lblNhan-cus"><label for="email">Email: </label></div>
        <div class="txtNhap-cus"><input type="text" id="email"  value="<?php echo $KhachHang->getEmail();?>"/></div><br/>

        <button type="submit" name="sbmTT" class="btnCapNhat">Cập nhật</button>
    </form>

</div>
</body>
</html>