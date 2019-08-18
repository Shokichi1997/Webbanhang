<?php session_start();ob_start();
if(isset($_POST['passcu'])){
    $passcu = $_POST['passcu'];
    include '../connected.php';
    if(isset($_SESSION['username']))
        $email = $_SESSION['username'];

    $tk = mysqli_query($link,"SELECT MatKhau FROM taikhoan where EmailDN = '$email'");
    $mk = mysqli_fetch_array($tk);
    if($passcu != $mk['MatKhau']){
        echo 1;
        exit();
    }
    else{
        if(isset($_POST['passmoi'])){
            $sqlup = "update taikhoan set MatKhau = '{$_POST['passmoi']}' where EmailDN = '$email'";
            mysqli_query($link,$sqlup);
            echo 2;
            exit();
        }
    }
    echo 1;
}

?>