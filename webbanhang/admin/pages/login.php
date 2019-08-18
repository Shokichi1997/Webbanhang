<?php
    ob_start();
    session_start();

  if(!isset($_SESSION['login'])) 
  $_SESSION['login']=array();
    if(isset($_COOKIE['idNV']))
{
    $_SESSION['login']['idNV']=$_COOKIE['idNV'];
    $_SESSION['login']['TenNV']=$_COOKIE['TenNV'];
	$_SESSION['login']['TenDN']=$_COOKIE['TenDangNhap'];
    $_SESSION['login']['MatKhau']=$_COOKIE['MatKhau'];
    setcookie("idNV",$_SESSION['login']['idNV'],time()+60*60*24*7);
    setcookie("TenNV",$_SESSION['login']['TenNV'],time()+60*60*24*7);
	header("location: ../admin.php?mod=ThongKe");
	
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<?php
include ("../database/connect.php");
if(isset($_POST['DangNhap']))
{
    $TenDangNhap=$_POST['Email'];
    $MatKhau=$_POST['MatKhau'];
    $NhoMK=$_POST['NhoMK'];
    if(empty($TenDangNhap) || empty($MatKhau))
        echo "Vui lòng nhập đầy đủ thông tin!";
    else
    {
        $kq=mysqli_query($link,"select * from nhanvien where TenDangNhap='$TenDangNhap' and MatKhau='$MatKhau'");
        if(mysqli_num_rows($kq)==1)
        {
            $d=mysqli_fetch_array($kq);
			
            $_SESSION['login']['idNV']=$d['IDNhanVien'];
            $_SESSION['login']['TenNV']=$d['TenNhanVien'];
			$_SESSION['login']['TenDN']=$d['TenDangNhap'];
            $_SESSION['login']['MatKhau']=$d['MatKhau'];

            if($NhoMK=='on')
            {
                setcookie("idNV",$_SESSION['login']['idNV'],time()+60*60*24*7);
                setcookie("TenNV",$_SESSION['login']['TenNV'],time()+60*60*24*7);
            }
			
            header("location: ../admin.php?mod=ThongKe");
        }
        else echo "Mật khẩu hoặc tên đăng nhập  sai!";
    }
}
?>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Đăng Nhập</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                
                                    <input class="form-control" placeholder="E-mail" name="Email" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mật Khẩu" name="MatKhau" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="NhoMK" type="checkbox" value="Remember Me">Nhớ mật khẩu
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="DangNhap" value="Đăng Nhập" class="btn btn-lg btn-success btn-block" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
