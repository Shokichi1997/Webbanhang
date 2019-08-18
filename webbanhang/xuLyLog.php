<?php session_start();ob_start();
header('Content-Type: text/html; charset=UTF-8');
	if(isset($_GET['dangxuat'])&&$_GET['dangxuat']=='yes'){
		if(isset($_COOKIE['taikhoan']))
        	setcookie('taikhoan','',time()-1000);
		if(isset($_SESSION['username']))
			unset($_SESSION['username']);
        if(isset($_SESSION['diaChi']))
            unset($_SESSION['diaChi']);
		header('location:index.php');
		exit();

	}

	if(isset($_COOKIE['taikhoan'])){
		$_SESSION['username'] = $_COOKIE['taikhoan'];
		//Gia hạn cookie
		setcookie('taikhoan',$_SESSION['username'],time()+60*60*10000);
		echo 3;
	}
	else{
        if(isset($_POST['email'])){
            $username = $_POST['email'];
            $pass = $_POST['pass'];
			//ket noi
            $link=mysqli_connect("localhost","root","","webbanhang");
 	         if(!$link){
	 	    die("Không kết nối :" . mysqli_connect_error());
   		    exit();
	        }
            $tk = mysqli_query($link,"SELECT * FROM taikhoan where EmailDN = '$username'");
            if((mysqli_num_rows($tk))==0){
                echo 1;
                exit();
            }

            $row = mysqli_fetch_array($tk);

            if(strcmp($pass,$row['MatKhau'])!=0){
                echo 2;
                exit();
            }

            //Lưu tên đăng nhập
            $_SESSION['username'] = $username;
            setcookie('taikhoan',$username,time()+60*60*10000);
            echo 3;

        }
	}
	//Người dùng và quản trị dùng cookie khác nhau
	/*if(isset($_SESSION['username'])){
		header('location:index.php');
	}*/


	

?>
