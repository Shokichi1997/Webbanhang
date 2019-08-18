
<?php

include ("connected.php");
///cap nhat so luong
 function updateSL($idsp,$sl){
			$link=mysqli_connect("localhost","root","","webbanhang");
		    mysqli_query($link,"set names 'utf8'");
			$sql="UPDATE sanpham SET SoLuong=SoLuong-$sl WHERE IDSanPham=$idsp AND SoLuong>0";
		   return  mysqli_query($link,$sql);
		}
///Tim san pham
function FindProduct($idsp){
			$link=mysqli_connect("localhost","root","","webbanhang");
		    mysqli_query($link,"set names 'utf8'");
			$sql="Select * FROM sanpham  WHERE IDSanPham=$idsp";
			$kq= mysqli_fetch_array( mysqli_query($link,$sql));
			return $kq;
		   
		}
//Tong tien
		function GetTongTien(){
			$kq=0;
			for($i=0;$i<count($_SESSION['giohang']);$i++){
				$kq+=$_SESSION['giohang'][$i]['SoLuong']*$_SESSION['giohang'][$i]['GiaBan'];
				}
			return $kq;
		   
		}
//create khach hang
function CreateCustumor($link,$TenKhachHang,$DiaChi,$ThanhPho,$SoDienThoai,$Email,$IDUser){
	$sql="INSERT INTO `khachhang` (`IDKhachHang`, `TenKhachHang`, `DiaChi`, `ThanhPho`, `SoDienThoai`, `Email`, `IDUser`)          VALUES (NULL, '$TenKhachHang', '$DiaChi', '$ThanhPho', '$SoDienThoai', '$Email','$IDUser')";
	 return  mysqli_query($link,$sql);
	}		
//tao hoa don
function CreateHoaDon($link,$idkhachhang,$tongtien,$diachi,$sodienthoai,$tt){
	
             
   $sql2="INSERT INTO `hoadon` (`IDHoaDon`, `IDKhachHang`, `NgayLap`, `TongTien`, `DiaChiGiaoHang`, `SoDienThoai`,`TrangThai`) 
		     VALUES ( NULL, '$idkhachhang', CURRENT_DATE(), '$tongtien', '$diachi', '$sodienthoai','$tt')";
			
          return  mysqli_query($link,$sql2);
           // unset($_SESSION['id_them_vao_gio']);
           // unset($_SESSION['sl_them_vao_gio']);

	}
	//lay ma khach hang va hoa don
	function getIDKhachHang2(){
		$link=mysqli_connect("localhost","root","","webbanhang");
		 if ($link->connect_errno) die ($link->connect_error);
        $table=$link->prepare("SHOW TABLE STATUS FROM webbanhang");
        $table->execute();
        $sonuc = $table->get_result();
            while ($satir=$sonuc->fetch_assoc()){
                if ($satir["Name"]== "khachhang"){
                    $ai[$satir["Name"]]=$satir["Auto_increment"];
                }
            }
        $LastAutoIncrement=$ai["khachhang"];
        return $LastAutoIncrement;
		}
		
	function getIDHoaDon(){
		$link=mysqli_connect("localhost","root","","webbanhang");
		 if ($link->connect_errno) die ($link->connect_error);
        $table=$link->prepare("SHOW TABLE STATUS FROM webbanhang");
        $table->execute();
        $sonuc = $table->get_result();
            while ($satir=$sonuc->fetch_assoc()){
                if ($satir["Name"]== "hoadon"){
                    $ai[$satir["Name"]]=$satir["Auto_increment"];
                }
            }
        $LastAutoIncrement=$ai["hoadon"];
        return $LastAutoIncrement;
		}
		
		 
		 
?>