<?php session_start();ob_start();
	if(isset($_POST['email'])){
		$ten = $_POST['name'];
		$email = $_POST['email'];
		$matkhau = $_POST['pass'];
		$sdt = $_POST['phone'];
		
		include("connected.php");
		$sql = "SELECT * FROM taikhoan WHERE EmailDN='$email'";
		$tt = mysqli_query($link,$sql);
		if(mysqli_num_rows($tt)>0){
			echo 1;
			exit();
			
		}
		$insert = "INSERT INTO taikhoan(`EmailDN`, `MatKhau`, `TenHienThi`) VALUES('$email','$matkhau','$ten')";
        mysqli_query($link,$insert);
		$sqlget = "select IDUser from taikhoan where EmailDN = '$email'";
		$tt = mysqli_query($link,$sqlget);
		$row = mysqli_fetch_array($tt);
		mysqli_query($link,"insert into khachhang(`TenKhachHang`,`SoDienThoai`,`Email`,`IDUser`) values('$ten','$sdt','$email','$row[0]')");
        $_SESSION['username'] = $email;
		echo 2;
	}
?>