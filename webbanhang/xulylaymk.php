<?php
if(isset($_POST['email'])){
    $email = $_POST['email'];
    include 'connected.php';
    $tk = mysqli_query($link,"SELECT * FROM taikhoan where EmailDN = '$email'");
    if((mysqli_num_rows($tk))==0){
        echo 1;
        exit();
    }

    $row = mysqli_fetch_array($tk);
    $pass = $row['MatKhau'];

    include 'controller/control.php';
    include('controller/class.smtp.php');
    include "controller/class.phpmailer.php";

    $title = 'Mật khẩu tài khoản của bạn';
    $content = 'Tài khoản: '.$email.'<br>Mật khẩu của bạn là: '.$pass;
    $nTo = $row['TenHienThi'];
    $mTo = $email;
    $diachicc = '';

    $mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
    if($mail==1)
        echo 2;
    else echo 3;
}
?>