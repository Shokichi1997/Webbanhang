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
            $sql = "select * from sanpham";
            if(!isset($_SESSION['sql']))
                $_SESSION['sql'] = $sql;

            if(!isset($_GET['idCL'])&&!isset($_GET['idLoai']))
                $sql = $_SESSION['sql'];
            else{
                if(isset($_GET['idCL'])) {
                    $sql = "select * from sanpham a, loai b where a.IDLoai = b.IDLoai and b.IDChungLoai = '{$_GET['idCL']}'";
                }
                if(isset($_GET['idLoai']))
                    $sql.=" and a.IDloai = '{$_GET['idLoai']}'";
                $_SESSION['sql'] = $sql;
            }

            //Phân trang cho san pham
            $numSP = 16;
            include ('phantrang.php');
            ?>
        </div>
    <div id="footer">
        <?php include("footer.php"); ?>
    </div>
</div>
<script type="text/javascript" src="public/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="public/js/events.js"></script>
</body>

</html>