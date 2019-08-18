<?php
session_start();
ob_start();

include ('connected.php');
include ('controller/control.php');

if(isset($_SESSION['diaChi'])){
    $TenKhachHang  = $_SESSION['diaChi'][0]['name'];
    $diaChi = $_SESSION['diaChi'][0]['diachi'];
    $soDienTHoai = $_SESSION['diaChi'][0]['sdt'];
    $emai = $_SESSION['diaChi'][0]['email'];

    if(isset($_SESSION['giohang'])){
        $tongtien = 0;

        $ngayDatHang = date("Y/m/d");
        $nhapHD = "insert into hoadon(`NgayLap`,`DiaChiGiaoHang`,`SoDienThoai`) 
        values('{$ngayDatHang}','{$diaChi}','{$soDienTHoai}') ";

        mysqli_query($link,$nhapHD);
        $ss = "select IDHoaDon from hoadon where NgayLap = '{$ngayDatHang}' and DiaChiGiaoHang = '{$diaChi}' and SoDienThoai = '{$soDienTHoai}'";
       $kq = mysqli_query($link,$ss);
        $r = mysqli_fetch_array($kq); //Có thể ra cả một mảng
        $idHD = $r['IDHoaDon'];
        $size = count($_SESSION['giohang']);
        for($i=0;$i<$size;$i++) {
            $idSP = $_SESSION['giohang'][$i]['IDSanPham'];
            $soluong = $_SESSION['giohang'][$i]['SoLuong'];
            $tenSP = $_SESSION['giohang'][$i]['TenSanPham'];
            $giaSp = getGia($link, $idSP);
            $thanhtien = getThanhTien($giaSp,$soluong);
            $tongtien += $giaSp * $soluong;

            $nhapCTHD = "INSERT INTO `cthoadon`(`IDHoaDon`, `IDSanPham`, `Gia`, `SoLuong`, `DonGia`)
            VALUES('{$idHD}','{$idSP}','{$giaSp}','{$soluong}','{$thanhtien}')";
            mysqli_query($link,$nhapCTHD);
        }
        $capnhatTongTien = "update hoadon set TongTien = '{$tongtien}' where IDHoaDon = '{$idHD}'";
        mysqli_query($link,$capnhatTongTien);

        if(isset($_SESSION['username'])){
            $idKH = "select b.IDKhachHang from taikhoan a,khachhang b where a.IDUser = b.IDUser and a.EmailDN = '{$_SESSION['username']}'";
            $result = mysqli_query($link,$idKH);
            $row = mysqli_fetch_array($result);
            $IDKhachHang = $row['IDKhachHang'];

            $updateIDKH = "update hoadon set IDKhachHang = '{$IDKhachHang}'";
            mysqli_query($link,$updateIDKH);
        }
    }
}
header('location:index.php');
?>