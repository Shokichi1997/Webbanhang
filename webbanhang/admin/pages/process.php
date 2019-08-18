<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 6/3/2018
 * Time: 9:45 AM
 */
ob_start();
session_start();
include ("../database/connect.php");

if(isset($_POST['SP_Them']))
{
    $idLoai=$_POST['idLoai'];
    $idNCC=$_POST['idNCC'];
    $TenSP=$_POST['TenSanPham'];
    $Hinh=$_FILES['Hinh'];
    $GiaNH=$_POST['GiaNhapHang'];
    $GiaGoc=$_POST['GiaGoc'];
    $SoLuong=$_POST['SoLuong'];

    if(!empty($Hinh['name']))
    {
		
        $target="../../images/products/";
        $filename=basename($Hinh['name']);
        $target.=$filename;
        if(copy($Hinh['tmp_name'],$target))
        {
            $s="INSERT INTO `sanpham`(`IDSanPham`, `TenSanPham`, `IDLoai`, `IDNhaCungCap`, `GiaGoc`, `SoLuong`, `Hinh`, `GiaNhapHang`, `NgayNhapHang`, `GiamGia`) 
            VALUES (null,'$TenSP',$idLoai,$idNCC,$GiaGoc,$SoLuong,'$filename',$GiaNH,null,null) ";
            if(mysqli_query($link,$s))
            {
                header("location: ../admin.php?mod=SanPham&Loai=$idLoai");
            }
            else echo $s;
        }else echo "UP file thất bại";
    }
    else echo "Bạn cần nhập hình!";
}

if(isset($_GET['SP_xoa']))
{
    $idSP=$_GET['SP_xoa'];
    $kq=mysqli_query($link,"select * from sanpham where IDSanPham=$idSP");
    $d=mysqli_fetch_array($kq);
    $idLoai=$d['IDLoai'];
    mysqli_query($link,"delete from sanpham where IDSanPham=$idSP");
    header("location: ../admin.php?mod=SanPham&Loai=$idLoai");
}


if(isset($_POST['SP_Sua']))
{
    $idLoai=$_POST['idLoai'];
    $idNCC=$_POST['idNCC'];
    $TenSP=$_POST['TenSanPham'];
    $Hinh=$_FILES['Hinh'];
    $GiaNH=$_POST['GiaNhapHang'];
    $GiaGoc=$_POST['GiaGoc'];
    $SoLuong=$_POST['SoLuong'];
    $idSP=$_POST['idSP'];
    $Hinh_cu=$_POST['Hinh_cu'];
    if(empty($Hinh['name']))
    {
        $s="UPDATE `sanpham` SET `TenSanPham`='$TenSP',`IDLoai`=$idLoai,`IDNhaCungCap`=$idNCC,
        `GiaGoc`=$GiaGoc,`SoLuong`=$SoLuong,`GiaNhapHang`=$GiaNH WHERE IDSanPham=$idSP";
        if(mysqli_query($link,$s))     header("location: ../admin.php?mod=SanPham&Loai=$idLoai");
        else echo $s;
    }
    else
    {
        unlink("../img/$Hinh_cu");
        $target="../img/";
        $filename=basename($Hinh['name']);
        $target.=$filename;
        if(copy($Hinh['tmp_name'],$target))
        {
            $s="UPDATE `sanpham` SET `TenSanPham`='$TenSP',`IDLoai`=$idLoai,`IDNhaCungCap`=$idNCC,
        `GiaGoc`=$GiaGoc,`SoLuong`=$SoLuong,`GiaNhapHang`=$GiaNH,`Hinh`='$filename' WHERE IDSanPham=$idSP";
            if(mysqli_query($link,$s))
            {
                header("location: ../admin.php?mod=SanPham&Loai=$idLoai");
            }
            else echo $s;
        }else echo "UP file thất bại";
    }


}

/*HOA DON*/
if(isset($_POST['HD_Sua']))
{
   
    $IDHoaDon=$_POST['IDHoaDon'];
    $DiaChiGiaoHang=$_POST['DiaChiGiaoHang'];
    $SoDienThoai=$_POST['SoDienThoai'];
    $TongTien=$_POST['TongTien'];
    $TrangThai=$_POST['TrangThai'];
	if($TrangThai=='Đang chờ duyệt'){
		$tt=1;
		}
	if($TrangThai=='Đã phê duyệt'){
		$tt=2;
		}
	if($TrangThai=='Đang giao hàng'){
		$tt=3;
		}
   if($TrangThai=='Đã giao'){
		$tt=4;
		}
   
        $s="UPDATE `HoaDon` SET `DiaChiGiaoHang`='$DiaChiGiaoHang',`SoDienThoai`=$SoDienThoai,`TongTien`=$TongTien,
        `TrangThai`='$TrangThai' WHERE IDHoaDon=$IDHoaDon";
        if(mysqli_query($link,$s))   
		  header("location: ../admin.php?mod=HoaDon&TrangThai=$tt ");
        else echo $s;
   

}

if(isset($_GET['HD_xoa']))
{
    $IDHoaDon=$_GET['HD_xoa'];
    $kq=mysqli_query($link,"select * from HoaDon where IDHoaDon={$_GET['HD_xoa']}");
    $d=mysqli_fetch_array($kq);
	if($d['TrangThai']=='Đang chờ duyệt')
    $tt=1;
	if($d['TrangThai']=='Đã phê duyệt')
    $tt=2;
	if($d['TrangThai']=='Đang giao')
    $tt=3;
	if($d['TrangThai']=='Đã giao')
    $tt=4;
	
    mysqli_query($link,"delete from HoaDon where IDHoaDon=$IDHoaDon");
    header("location: ../admin.php?mod=HoaDon&TrangThai=$tt");
}




if(isset($_GET['DangXuat']))
{
    unset($_SESSION['login']);
    header("location: login.php");
}
?>

