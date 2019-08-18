<?php
    function getTenSP($link,$idSP){
        $sql = "select TenSanPham from sanpham where IDSanPham = '$idSP'";
        $result = mysqli_query($link,$sql);
        $row = mysqli_fetch_array($result);
        return $row['TenSanPham'];
    }

    function getGia($link,$idSP){
        $sql = "select TenSanPham,GiaGoc,GiamGia from sanpham where IDSanPham = '$idSP'";
        $result = mysqli_query($link,$sql);
        $row = mysqli_fetch_array($result);
        return ( $row['GiaGoc'] - $row['GiaGoc'] * $row['GiamGia']) ;
    }

    function getThanhTien($giaSP,$soLuong){
        return $giaSP*$soLuong;
    }

    function getIDKhachHang($link,$Email){
        $sql = "select b.IDKhachHang from taikhoan a,khachhang b where a.IDUser = b.IDUser and a.EmailDN = '$Email'";
        $result = mysqli_query($link,$sql);
        $row = mysqli_fetch_array($result);
        return $row['IDKhachHang'];
    }
    function getHoaDon($link,$Email){
        $IDKhachHang = getIDKhachHang($link,$Email);
        $sql = "select * from hoadon where IDKhachHang = '{$IDKhachHang}'";
        $result = mysqli_query($link,$sql);
        return $result;
    }

    function getCTHoaDon($link,$IDHoaDon){
        $sql = "select * from cthoadon where IDHoaDon = $IDHoaDon";
        $result = mysqli_query($link,$sql);
        return $result;
    }

    function getTenSanPham($link,$IDHoaDon,$IDSanPham){
        $sql = "select a.TenSanPham from sanpham a,cthoadon b where a.IDSanPham = b.IDSanPham and b.IDHoaDon = $IDHoaDon and b.IDSanPham = $IDSanPham";
        $result = mysqli_query($link,$sql);
        return $result;

    }

    function sendMail($title, $content, $nTo, $mTo,$diachicc=''){
        $nFrom = 'DienTu production';
        $mFrom = 'hoangvanlam197@gmail.com';
        $mPass = '456@ovi.com';
        $mail = new PHPMailer();
        $body             = $content;
        $mail->IsSMTP();
        $mail->CharSet   = "utf-8";
        $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
        $mail->SMTPAuth   = true;                    // enable SMTP authentication
        $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
        $mail->Host       = "smtp.gmail.com";
        $mail->Port       = 465;
        $mail->Username   = $mFrom;  // GMAIL username
        $mail->Password   = $mPass;               // GMAIL password
        $mail->SetFrom($mFrom, $nFrom);
        //chuyen chuoi thanh mang
        $ccmail = explode(',', $diachicc);
        $ccmail = array_filter($ccmail);
        if(!empty($ccmail)){
            foreach ($ccmail as $k => $v) {
                $mail->AddCC($v);
            }
        }
        $mail->Subject    = $title;
        $mail->MsgHTML($body);
        $address = $mTo;
        $mail->AddAddress($address, $nTo);
        $mail->AddReplyTo('hoangvanlam197@gmail.com', 'DienTu Production');
        if(!$mail->Send()) {
            return 0;
        } else {
            return 1;
        }
    }
?>