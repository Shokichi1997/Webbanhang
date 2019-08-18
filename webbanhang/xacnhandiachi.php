<?php session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="public/css/CSSCoban.css" rel="stylesheet" type="text/css"/>
    <link href="public/css/header.css" rel="stylesheet" type="text/css" />
    <link href="public/css/footer.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="container">
    <div id="header">
        <?php include ("header.php");?>
    </div>
    <div style="clear: both"></div>
    <!--Phần thân-->
    <div class="body-trang" style="margin-bottom: 20px;min-height: 300px">
    <?php include ("connected.php");
    if(!isset($_SESSION['diaChi']))
        $_SESSION['diaChi'][] = array();
    if(isset($_SESSION['username'])){
        $sql = "select a.* from sodiachi a,taikhoan b where a.IDUser = b.IDUser and b.EmailDN = '{$_SESSION['username']}'";
        $res = mysqli_query($link,$sql);
        if(mysqli_num_rows($res)==0){
            if(isset($_POST['sbmTT'])){
                echo $_POST['name'];
                $_SESSION['diaChi'][0]['name'] = $_POST['name'];
                $_SESSION['diaChi'][0]['diachi'] = $_POST['diachi'];
                $_SESSION['diaChi'][0]['sdt'] = $_POST['sdt'];
                $_SESSION['diaChi'][0]['email'] = $_POST['email'];

                $userID = "select IDUser from taikhoan where EmailDN = '{$_SESSION['username']}'";
                $result = mysqli_query($link,$userID);
                $kq = mysqli_fetch_array($result);
                $sqlIS = "INSERT INTO `sodiachi`(`TenKhachHang`, `DiaChi`, `SoDienThoai`, `Email`, `IDUser`)
                VALUES ({$_POST['name']},{$_POST['diachi']},{$_POST['sdt']},{$_POST['email']},{$kq['IDUser']})";
            }
        }
        else{

            $row = mysqli_fetch_array($res);
            $_SESSION['diaChi'][0]['name'] = $row['TenKhachHang'];
            $_SESSION['diaChi'][0]['diachi'] = $row['DiaChi'];
            $_SESSION['diaChi'][0]['sdt'] = $row['SoDienThoai'];
            $_SESSION['diaChi'][0]['email'] = $row['Email'];
        }

    }
    else{
        if(isset($_POST['sbmTT'])&&$_POST['diachi']!=""){
            $_SESSION['diaChi'][0]['name'] = $_POST['name'];
            $_SESSION['diaChi'][0]['diachi'] = $_POST['diachi'];
            $_SESSION['diaChi'][0]['sdt'] = $_POST['sdt'];
            $_SESSION['diaChi'][0]['email'] = $_POST['email'];

        }

    }
    ?>

    <div class="phanDiaChi">
        <div class="tieude-thanhtoan">Địa chỉ giao hàng</div>

        <?php if(isset($_SESSION['username'])||isset($_SESSION['diaChi'])&&isset($_SESSION['diaChi'][0]['diachi'])){ ?>

        <div class="diaChiGH">
            <div class="hoten-KH" style="font-weight: bold">Người nhận: <?php echo $_SESSION['diaChi'][0]['name'];?></div>
            <div class="diachi-KH">Địa chỉ: <?php echo $_SESSION['diaChi'][0]['diachi'];?></div>
            <div class="soPhone">Số điện thoại: <?php echo $_SESSION['diaChi'][0]['sdt'];?></div>
            <div class="email-tt">Email: <?php echo $_SESSION['diaChi'][0]['email'];?></div>
            <div id="nutSuaDC" >
                <img src="images/icon/fix.png" alt="" width="25px" height="25px" style="position: relative;top:5px;"/> Sửa
            </div>
            <div id="nutTT" ><a href="thanhtoan.php">Giao hàng đến địa chỉ này</a>
            </div>
            <div style="clear: both;"></div>
        </div>
        <?php }else{?>
        <div class="diaChiGH">
            <div >Không có địa chỉ giao hàng</div>
            <div id="nutThemDC">
                <img src="images/icon/add.png" alt="" width="25px" height="25px" style="position: relative;top:5px;"/>Thêm
             </div>
        </div>
        <?php }?>

    </div>

    <div id="suaThongTin">
        <form action="" method="post" name="formSuaTT">
            <div class="lblNhan-cus"><label for="name" >Họ và tên: </label></div>
            <div class="txtNhap-cus"><input type="text" id="name" name="name" value="<?php echo isset($_SESSION['username'])?$_SESSION['diaChi'][0]['name']:"";?>"/></div><br/>
            <div class="lblNhan-cus"> <label for="diachi" >Địa chỉ: </label></div>
            <div class="txtNhap-cus"> <input type="text" id="diachi" name="diachi" value="<?php echo  isset($_SESSION['username'])?$_SESSION['diaChi'][0]['diachi']:"";?>"/></div><br/>
            <div class="lblNhan-cus"><label for="sdt" >Số điện thoại: </label></div>
            <div class="txtNhap-cus"> <input type="text" id="sdt" name="sdt" value="<?php echo  isset($_SESSION['username'])?$_SESSION['diaChi'][0]['sdt']:"";?>"/></div><br/>
            <div class="lblNhan-cus"><label for="email">Email: </label></div>
            <div class="txtNhap-cus"><input type="text" id="email" name="email" value="<?php echo  isset($_SESSION['username'])?$_SESSION['diaChi'][0]['email']:"";?>"/></div><br/>

            <button type="submit" name="sbmTT" class="btnCapNhat">Cập nhật</button>



        </form>
    </div>




    <script type="text/javascript">
        $("#nutSuaDC").click(function () {
            $("#suaThongTin").css("display","block");

        })
        $("#nutThemDC").click(function () {
            $("#suaThongTin").css("display","block");
        });
        $("formSuaTT").submit(function () {
            $("#suaThongTin").css("display","none");
        })
    </script>
    <!----------------------------------------->
    </div>
    <div style="clear: both;"></div>
    <?php include ("footer.php");?>
</div>
<script type="text/javascript" src="public/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="public/js/events.js"></script>
</body>
</html>