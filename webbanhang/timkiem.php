<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="public/css/CSSCoban.css" rel="stylesheet" type="text/css"/>
    <link href="public/css/header.css" rel="stylesheet" type="text/css" />
    <link href="public/css/footer.css" rel="stylesheet" type="text/css" />
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <title>Điện tử Product</title>
</head>

<body bgcolor="#CCCCCC">
<?php 	include('connected.php'); ?>

<div id="container">
    <div id="header">
        <?php include("header.php"); ?>
        <div style="clear:both"></div>
        <div style="clear:both;"></div>
    </div>
    <?php include('menu.php');?>

    <div id="listSanPham">

        <?php
        include ('connected.php');
        if(isset($_GET['search-box'])) {
            $key = $_GET['search-box'];
            $sql="select * from sanpham where TenSanPham like '%$key%' ";
            $numKQ = mysqli_num_rows(mysqli_query($link,$sql));
            if($numKQ > 0){
                echo "<p style='font-size: 20px;margin-left: 20px;'>Có <span style='color: #0000FF;'>$numKQ</span> sản phẩm được tìm thấy </p>";
            }
            else
                echo "<p style='font-size: 20px;margin-left: 20px;'>Không có sản phẩm được tìm thấy </p>";

            //Phân trang cho san pham
            $numSP = 16;
            include ('phantrang.php');
        }
        else
            echo "<p style='font-size: 20px;margin-left: 20px;'>Không có sản phẩm được tìm thấy </p>";

        ?>
    </div>
    <div id="footer">
        <?php include("footer.php"); ?>
    </div>
</div>
</body>
<script type="text/javascript" src="public/js/events.js"></script>
</html>