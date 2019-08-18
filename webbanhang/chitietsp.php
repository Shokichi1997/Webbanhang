<?php 
  ob_start();
  session_start();
  if(!isset($_SESSION['giohang'])) 
  $_SESSION['giohang']=array();
  include("connected.php");
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

</head>

<body>
<div id="container">
  <div id="header">
    <?php include("header.php"); ?>
    <div style="clear:both"></div>
  </div>
  <div id="body-menu2">
  <?php
		 include("xuly.php");
		//--------------------------------------------------------
		
       
  		if(isset($_GET['idSP'])) {
            $idSP = $_GET['idSP'];
        }
        else if(!isset($_GET['idSP']))
            header('location:index.php');
        if(strlen($_GET['idSP'])==0) header('location:index.php');

		
		$sqlSP = "SELECT * FROM sanpham a,nhacungcap b WHERE IDSanPham = '{$idSP}' AND a.IDNhaCungCap = b.IDNhaCungCap";
		$kqSP = mysqli_query($link,$sqlSP);
		$row = mysqli_fetch_array($kqSP);

      $sqlTT = "select c.IDChungLoai, a.IDLoai,c.TenChungLoai,a.TenLoai 
            from loai a,sanpham b,chungloai c where a.IDLoai = b.IDLoai and a.IDChungLoai = c.IDChungLoai and b.IDSanPham = '$idSP'";
      $duongdan = mysqli_query($link,$sqlTT);
      $re = mysqli_fetch_array($duongdan);
  ?>
      <script type="text/javascript">
          $(document).ready(function(){
              $('#zoom1').zoom();
          });</script>

      <div class="cayThuMuc"><div class="node-thumuc"><a href="index.php">Trang chủ</a> > <a href="sanpham.php?idCL=
  <?php echo $re['IDChungLoai'];?>"><?php echo $re['TenChungLoai'];?></a> > <a href="sanpham.php?idCL=
  <?php echo $re['IDChungLoai'];?>&&idLoai=<?php echo $re['IDLoai'];?>"><?php echo $re['TenLoai'];?></a></div></div>
  <div class="hinhanh-sp">
  	<span class="zoom" id="zoom1"><img src="images/products/<?php echo $row['Hinh'];?>" /></span>
  </div>

  <div class="chitiet-sp">
  	<div class="ten-sp">
    	<div class="ten"><?php echo $row['TenSanPham'];?></div>
    	<div class="nsx">Nhà sản xuất: <span style="color: #0099FF;"><?php echo $row['TenNhaCungCap'];?></span></div>
    </div>
    <div class="gia-sp">
    	<div class="gia"><?php echo $row['GiaGoc'] - $row['GiaGoc'] * $row['GiamGia']; ?> đ</div>
        <?php if($row['GiamGia']!=0){?>
        <div class="giamGia">Tiết kiệm: <span style="color:#FF0000;"><?php echo $row['GiamGia'] * 100; ?>%</span> (<?php echo $row['GiamGia']*$row['GiaGoc'];?> đ) </div>
        <div class="giaGoc">Giá thị trường: <?php echo $row['GiaGoc']; ?> đ</div>

         <div class="giaGoc">Số lượng còn: <?php echo $row['SoLuong']; ?> </div>
        <?php }?>
    </div>
    <div class="thongtin-sp">
    	Loại Tivi: Android Tivi <br />
        Kích cỡ màn hình:43 inch<br />
        Độ phân giải: Ultra HD 4K<br />
        Chỉ số chuyển động rõ nét: Motionflow™ XR 200 Hz<br />
</div>
    <div class="them-gioHang">
    	<div class="sl">

            <span>Số lượng: </span>
            <form name="formSL" action="#" method="post")>
                <button type="button" id="truSL" class="truSL" value="tru">-</button>
                <input type="text" id = "soluongSP" name = "soluongSP" value="1"/>
                
                <button type="button" id="congSL" class="congSL" value="cong">+</button>
            
        </div>
        <div class="add-gio">
                  
                    <input type="submit" name="btnThemSP" id="btnThemSP" value="Thêm" />
   
        <?php 
		
	    
		//thêm sản phẩm vào giỏ hàng ở trang ctsp
        if(isset($_POST['btnThemSP'])){
			 $kt=0;
			
                for($i=0;$i<count($_SESSION['giohang']);$i++)
                {
				
	              if($_SESSION['giohang'][$i]['IDSanPham']==$_GET['idSP'])
	              {
					   
		   	           $_SESSION['giohang'][$i]['SoLuong']+=1; 
					   $kt=1;
					   //update so luong
					    updateSL($_GET['idSP'],1);
					    
					    break;
	              }
                
			    }
           if($kt==0){
			  
		      $s="select * from sanpham where IDSanPham=".$_GET['idSP'];
	          $kq=mysqli_query($link,$s);
	          $d=mysqli_fetch_array($kq);
			  ////////////////////////////
			  //kiem tra so luong them
			 if($d['SoLuong']>=$_POST['soluongSP'])
			 {
	         $k=count($_SESSION['giohang']);
	         $_SESSION['giohang'][$k]['IDSanPham']=$d['IDSanPham'];
	         $_SESSION['giohang'][$k]['TenSanPham']=$d['TenSanPham'];
	         $_SESSION['giohang'][$k]['GiaBan']=$d['GiaGoc']-($d['GiamGia']*$d['GiaGoc']);
	         $_SESSION['giohang'][$k]['Hinh']=$d['Hinh'];
	         $_SESSION['giohang'][$k]['SoLuong']=$_POST['soluongSP'];
			//update so luong
			  updateSL($_GET['idSP'],$_POST['soluongSP']);
			  
			 }
			 else{
				 return;
				 }
	      }	
 	     header("location:chitietsp.php");
       }		   
         ?>   
        </div>
        </form>
    </div>
  </div>
  </div>
  <div style="clear:both"></div>
  <div class="spTuongTu">
  	<div class="tieude-sptt">Sản phẩm tương tự</div>
  	<div class="sp-tt"></div>
  </div>
  <div id="footer">
    <?php include("footer.php"); ?>
  </div>
</div>

<?php ?>
<script type="text/javascript" src="public/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="public/js/events.js"></script>
<script type="text/javascript" src="public/js/jquery.zoom.min.js"></script>

</body>

</html>