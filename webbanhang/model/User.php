<?php
class User
{
    private $IDKhachHang ;
    private $TenKhachHang;
    private $DiaChi;
    private $ThanhPho;
    private $SoDienThoai;
    private $Email;


    public function __construct(){
        $this->IDKhachHang = "";
        $this->TenKhachHang = "";
        $this->DiaChi = "";
        $this->SoDienThoai="";
        $this->Email="";
    }


    public function getDuLieu($link,$Email){
        $sql = "select * from khachhang a,taikhoan b where a.IDUser = b.IDUser and b.EmailDN = '$Email'";
        $tt = mysqli_query($link,$sql);
        $row = mysqli_fetch_array($tt);
        $this->IDKhachHang = $row['IDKhachHang'];
        $this->TenKhachHang = $row['TenKhachHang'];
        $this->DiaChi = $row['DiaChi'];
        $this->ThanhPho = $row['ThanhPho'];
        $this->SoDienThoai = $row['SoDienThoai'];
        $this->Email = $row['Email'];

    }

    public function getID(){
        return $this->IDKhachHang;
    }
    public function getTenKhachHang(){
        return $this->TenKhachHang;
    }
    public function getDiaChi(){
        return $this->DiaChi;
    }
    public function getSoDienThoai(){
        return $this->SoDienThoai;
    }
    public function getEmail(){
        return $this->Email;
    }

    public function getThanhPho(){
        return $this->ThanhPho;
    }


}
