<?php session_start();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="public/css/CSSCoban.css" rel="stylesheet" type="text/css"/>
    <link href="public/css/header.css" rel="stylesheet" type="text/css" />
    <link href="public/css/footer.css" rel="stylesheet" type="text/css" />
    <title>Điện tử Product</title>
</head>

<body bgcolor="#CCCCCC">

<div id="container">
    <div id="header">
        <?php include("header.php"); ?>
        <div style="clear:both"></div>
    </div>

    <div >
        <div class="menu">
            <ul class="menuKH">
                <li id="thongtinKH"><img src="" alt=""/> Thông tin khách hàng</li>
                <li id="doimk"><img src="" alt=""/>Đổi mật khẩu</li>
                <li id="thongBaoKH"><img src="" alt=""/>Thông báo của tôi</li>
                <li id="donHangCT"><img src="" alt=""/>Đơn hàng của tôi</li>

            </ul>
        </div>
        <div id="body-kh"></div>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#thongtinKH").click(function () {
                    $("#body-kh").load("view/thongtinUser.php");
                    $("#thongtinKH").css({'backgroundColor':'#CCCC'});
                    $("#thongBaoKH").css({'backgroundColor':'#0000'});
                    $("#donHangCT").css({'backgroundColor':'#0000'});
                    $("#doimk").css({'backgroundColor':'#0000'});

                });
                $("#thongBaoKH").click(function () {
                    $("#body-kh").load("view/thongBao.php");
                    $("#thongBaoKH").css({'backgroundColor':'#CCCC'});
                    $("#donHangCT").css({'backgroundColor':'#0000'});
                    $("#thongtinKH").css({'backgroundColor':'#0000'});
                    $("#doimk").css({'backgroundColor':'#0000'});
                });
                $("#donHangCT").click(function () {
                   $("#body-kh").load("view/donHang.php");
                    $("#donHangCT").css({'backgroundColor':'#CCCC'});
                    $("#thongBaoKH").css({'backgroundColor':'#0000'});
                    $("#thongtinKH").css({'backgroundColor':'#0000'});
                    $("#doimk").css({'backgroundColor':'#0000'});
                });
                $("#doimk").click(function () {
                    $("#body-kh").load("view/doimatkhau.php");
                    $("#doimk").css({'backgroundColor':'#CCCC'});
                    $("#thongBaoKH").css({'backgroundColor':'#0000'});
                    $("#thongtinKH").css({'backgroundColor':'#0000'});
                    $("#donHangCT").css({'backgroundColor':'#0000'});
                })
                $("#thongtinKH").trigger('click');

            });
        </script>
    </div>


    <div id="footer">
        <?php include("footer.php"); ?>
    </div>
</div>


<script type="text/javascript" src="public/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="public/js/events.js"></script>
</body>

</html>