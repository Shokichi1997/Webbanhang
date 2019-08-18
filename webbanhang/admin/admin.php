<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['login']))
        {
          //  $_SESSION['login']=array();
            header("location:pages/login.php");
		   echo 'chua dang nhap';
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>



  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   <!--POPUP THONG TIN TAI KHOAN-->
   
 

    <title>Admin-WBH</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



</head>

<body>


 <!-- show thong tin tai khoan!-->
<div class="container" >
  <!-- Trigger the modal with a button -->
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thông tin cá nhân</h4>
        </div>
        <div class="modal-body">
         
                    <div class="" style="width:300px">
                        <form role="form" action="" method="post">
                            <fieldset>
                                <div class="form-group" > 
                               
                                    <input  class="form-control"
                                    name="TenHT" type="text" value="" placeholder="Ten hien thi..."/>                                    
                                </div>
                                
                                 <div class="form-group" > 
                               
                                    <input  class="form-control"
                                    name="TenDN" type="text" value="" placeholder="Ten dang nhap...."/>
                                </div>
                                
                                <div class="form-group">
                                    <input class="form-control" 
                                     name="MatKhau" type="password" value="" placeholder="Mat khau...."/>
                                </div>
                                
                                <div class="form-group">
                                    <input class="form-control" 
                                     name="MatKhau2" type="password" 
                                     placeholder="Nhập lại mật khẩu...."
                                     value=""
                                    
                                    "/>
                                </div>
                                 <div class="form-group">
                                    <label class="form-control" 
                                     name="tb"  
                                     value=""
                                    
                                    "/>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="CapNhat" value="Cập nhật" class="btn btn-lg btn-success btn-block" />
                            </fieldset>
                        </form>
                        
                        <?php 
						 $link=mysqli_connect("localhost","root","","webbanhang");
						if(isset($_POST['CapNhat'])){
							if($_POST['MatKhau']!=$_POST['MatKhau2']){
								$_POST['tb']="Vui long xac nhan lai mat khau ";
								}
							$TenHT=$_POST['TenHT'];
							$TenDN=$_POST['TenDN'];
							$MK=$_POST['MatKhau'];
							$idnv=$_SESSION['login']['idNV'];
						$qr="UPDATE NhanVien SET TenNhanVien = '$TenHT',TenDangNhap='$TenDN',MatKhau='$MK' WHERE IDNhanVien=$idnv ";
							mysqli_query($link,$qr);
							}
						?>
                    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background-color:powderblue">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">PestShop Admin</a>
                
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                 <span style="color:#30F">
                   <marquee width="100%"> 
                     <?php
                         echo 'Xin chào '. $_SESSION['login']['TenNV'];
				      ?>
                 </marquee>
                </span>

                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>

                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#" data-toggle="modal" data-target="#myModal" style="display:block"><i class="fa fa-user         fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="pages/process.php?DangXuat=1"><i class="fa fa-sign-out fa-fw"></i> Đăng Xuất</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                    
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
                          
            <div class="navbar-default sidebar" role="navigation"  >
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="ThongKe.php"><i class="fa fa-dashboard fa-fw"></i> Thống kê</a>
                             <ul class="nav nav-second-level">
                                 <li><a href="?mod=ThongKe">Doanh số bán hàng</a> </li>
                                 <li><a href="?mod=ThongKeSanPham">Sản phẩm</a></a></li>
                                 <li><a href="?mod=ThongKe">Tùy chọn</a></li>
                             </ul>
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Hóa Đơn</a>
                            
                             <ul class="nav nav-second-level">
                                 <li><a href="?mod=HoaDon&TrangThai=1">Hóa đơn đang chờ duyệt </a> 
                                 (<?php
							    $link=mysqli_connect("localhost","root","","webbanhang");
                              
							    $trangthai='Đang chờ duyệt';
                                $kqhd=mysqli_query($link,"select * from HoaDon where TrangThai='$trangthai' ");
								$ds=mysqli_fetch_array($kqhd);
								echo  count($ds)." HĐ";
							    ?>)
                                </li>
                                 <li><a href="?mod=HoaDon&TrangThai=2">Hóa đơn đã duyệt</a></a></li>
                                 <li><a href="?mod=HoaDon&TrangThai=3">Hóa đơn đang giao</a></li>
                                 <li><a href="?mod=HoaDon&TrangThai=4">Hóa đơn đã giao</a></li>
                             </ul>
                        </li>
                         <li>
                            <a href="?mod=SanPham"><i class="fa fa-product-hunt fa-fw"></i> Sản phẩm</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Loại</a>
                        </li>
                       

                         <li>
                            <a href="?mod=KhachHang"><i class="fa fa-user fa-fw"></i> Khách hàng</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <!-- /#page-wrapper -->
        <?php
        include ("database/connect.php");
        $mod=@$_GET['mod'];
        if(empty($mod)) $mod="TongQuan";
        include ("pages/{$mod}.php");
        ?>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
