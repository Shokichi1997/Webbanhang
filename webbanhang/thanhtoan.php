<?php session_start();
ob_start();
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="public/css/CSSCoban.css" rel="stylesheet" type="text/css"/>
    <link href="public/css/header.css" rel="stylesheet" type="text/css" />
    <link href="public/css/footer.css" rel="stylesheet" type="text/css" />
   <style>
   button{
	   cursor:pointer;
	   }
	  
   </style>
</head>

<body>


<div id="container">
    <div id="header">
    
        <?php
		include("xuly.php");
		if(!isset($_SESSION['giohang'])){
			 header('location:index.php');
			}
		 
		
		?>
        
        <div style="clear:both"></div>
    </div>
    <div id="body-menu">
        <div style="float: left">
        <div class="khungDiaChi">
                <div class="hoten-KH" style="font-weight: bold">Người nhận: <?php echo $_SESSION['diaChi'][0]['name'];?></div>
                <div class="diachi-KH">Địa chỉ: <?php echo $_SESSION['diaChi'][0]['diachi'];?></div>
                <div class="soPhone">Số điện thoại: <?php echo $_SESSION['diaChi'][0]['sdt'];?></div>
                <div class="email-tt">Email: <?php echo $_SESSION['diaChi'][0]['email'];?></div>
        </div>
        <div class="khungPThucTT">
            <h4>Chọn phương thức thanh toán:</h4>
            <form action="" name="formPTThanhToan">
                <div class="row-radio">
                    <input type="radio" id="marter" value="martercard" name="ttoan"/>
                    <img src="images/pttt/the-mastercard.png" alt="martercard"/>
                    <label for="marter">Martercard</label>

                </div>
                <div style="clear: both;"></div><br/>

                <div class="row-radio">
                    <input type="radio" id="visa" value="martercard" name="ttoan"/>
                    <img src="images/pttt/Logo-Visa.jpg" alt="martercard"/>
                    <label for="visa">Thẻ Visa</label>

                </div>
                <div style="clear: both;"></div><br/>

                <div class="row-radio">
                    <input type="radio" id="tienmat" value="martercard" name="ttoan" checked="checked"/>
                    <img src="images/pttt/tienmat.png" alt="martercard"/>
                    <label for="tienmat">Tiền mặt</label>

                </div>
                <div style="clear: both;"></div><br/>
            </form>
        </div>
        </div>
        <div class="khungHoaDon">

            <h2 style="color: green">Hóa đơn</h2>
            <?php if(isset($_SESSION['giohang'])){
                $tongtien = 0;
                include ('connected.php');
                include ('controller/control.php');
                $size = count($_SESSION['giohang']);
                for($i=0;$i<$size;$i++){
                    $idSP = $_SESSION['giohang'][$i]['IDSanPham'];
                    $soluong = $_SESSION['giohang'][$i]['SoLuong'];
                    $tenSP = $_SESSION['giohang'][$i]['TenSanPham'];
                    $giaSp = getGia($link,$idSP);
                    $tongtien += (float)$giaSp * (int)$soluong;
                    echo "<div><span style='font-weight: bold;'>$tenSP</span>";
                    echo "&nbsp&nbsp&nbsp&nbsp x&nbsp&nbsp $soluong</div>";
                }
                ?>
                <hr/>
                <div style="float: right;font-size: 20px">Tổng tiền: <span id="tongTienTT" style="color: red;"><?php echo $tongtien;?> đ</span> </div>
            <?php
                echo 'gio'.date("Y/m/d");
            }?>

        </div>
        
        <form action="#" name="fm" id="fm" method="post">
       
          <div class="nutDatHang"><button type="submit" id="nutDatHang" name="btndathang" >Đặt hàng  
          </button>
        </form>
        
         <?php
		if(isset($_POST['btndathang'])){
			
			//DAT HANG	
			//Tao khach hang
			//Toa hoa don
			//Tao chi tiet hoa don
			//Huy gio hang
			//kiem tra
			
			//B1: TAO KHACH HANG
			$tp="HCM";
			$sql="INSERT INTO `khachhang`(`IDKhachHang`, `TenKhachHang`, `DiaChi`, `ThanhPho`, `SoDienThoai`, `Email`,                 `IDUser`)
                  VALUES (NULL,'{$_SESSION['diaChi'][0]['name']}', '{$_SESSION['diaChi'][0]['diachi']}',                                     '$tp','{$_SESSION['diaChi'][0]['sdt']}', '{$_SESSION['diaChi'][0]['email']}',NULL)";
	         mysqli_query($link,$sql);
			 $idKhachHang=getIDKhachHang2()-1;
			//:B2 TAO HOA DON	        
	    	$kq=0;
		    for($i=0;$i<count($_SESSION['giohang']);$i++){
				$kq+=$_SESSION['giohang'][$i]['SoLuong']*$_SESSION['giohang'][$i]['GiaBan'];
				}		
		     //create order 
        CreateHoaDon($link,$idKhachHang,$kq,$_SESSION['diaChi'][0]['diachi'],$_SESSION['diaChi'][0]['sdt'],"Đang chờ duyệt");
		     $idhd=getIDHoaDon()-1;
			//B3: TAO CTHD
			for($i=0;$i<count($_SESSION['giohang']);$i++){
					$thanhtien=$_SESSION['giohang'][$i]['GiaBan']*$_SESSION['giohang'][$i]['SoLuong'];
					$sqlcthd="INSERT INTO `cthoadon` (`IDHoaDon`, `IDSanPham`, `Gia`, `SoLuong`,`DonGia`)
			 VALUES ('$idhd', '{$_SESSION['giohang'][$i]['IDSanPham']}', '{$_SESSION['giohang'][$i]['GiaBan']}', '{$_SESSION['giohang'][$i]['SoLuong']}','$thanhtien');";
			 mysqli_query($link,$sqlcthd);
				}
		    
			
			  	 //B4: HUY GIO
			  unset($_SESSION['giohang']); 
			  header('location:index.php');

			}
			  
		 ?>
        </div>
    </div>
    <div style="clear: both;"></div>
    <?php include ("footer.php");?>
</div>
<script type="text/javascript" src="public/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="public/js/events.js"></script>
</body>
</html>