<?php
ob_start();session_start();
if(!isset($_SESSION['giohang'])||count($_SESSION['giohang'])==0) 
  header('location:index.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="public/css/CSSCoban.css" rel="stylesheet" type="text/css"/>
<link href="public/css/header.css" rel="stylesheet" type="text/css" />
<link href="public/css/footer.css" rel="stylesheet" type="text/css" />
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>

</head>

<body>
<div id="container">
  <div id="header">
 
    <?php 
	
	      include("header.php");
	      include("connected.php");
		  include("xuly.php");
		  if(isset($_POST['xoagio'])){
			  unset($_SESSION['giohang']);
			  }
			  $tamtinh=0;
		  
	 ?>
    <div style="clear:both"></div>
  </div>
  <div id="body-menu">
    <div class="sp-trong-gio">
     
		<?php
		 if(!isset($_SESSION['giohang'])|| $_SESSION['giohang'][0]['IDSanPham']==NULL){
           
		     unset($_SESSION['giohang']);
             header('location:index.php');
			
			}
			
			for($i=0;$i<count($_SESSION['giohang']);$i++)
			 {
			?>
					<?php
                    if(!isset($_SESSION['giohang'][$i])){
						return;
						}
					
					$tamtinh+=$_SESSION['giohang'][$i]['SoLuong']*$_SESSION['giohang'][$i]['GiaBan'];
					?>
                    
      <div class="hinhsp-tronggio">    
       <img src="images/products/<?php echo $_SESSION['giohang'][$i]['Hinh'];?>" width="100%"/>
       </a>
       </div>
        
       <div class="thongtin-sp-giohang">
        <div class="tensp-trong-gio">
        <a href=""><?php echo $_SESSION['giohang'][$i]['TenSanPham']; ?>
                                   </a>
        </div>
        <div class="giasp-trong-gio"><b>Giá:</b><?php echo $_SESSION['giohang'][$i]['GiaBan'];?>         </div>
        <div class="giasp-trong-gio"><b>Số Lượng:</b><?php echo $_SESSION['giohang'][$i]['SoLuong'];?>         </div>
      </div>
      <div class="soLuong-trong-gio sl">
       <form  name="form1" action="#" method="post" >
     
        <button type="submit" id="truSL" name="<?php echo $_SESSION['giohang'][$i]['ID']; ?>" 
         class="truSL">-</button>
        <input type="text" id = "soluongSP" name = "soluongSP"
         value="<?php echo $_SESSION['giohang'][$i]['SoLuong']; ?>" />
        <button type="submit" id="congSL" 
        name="<?php echo $_SESSION['giohang'][$i]['IDSanPham']; ?>"    
          class="congSL">+</button> 
       </form>    
      </div>
       <?php
	    $kq=FindProduct($_SESSION['giohang'][$i]['IDSanPham']);
	   
		//thêm sản phẩm vào giỏ hàng
		$name= $_SESSION['giohang'][$i]['IDSanPham'];
		$namegiamsl= $_SESSION['giohang'][$i]['TenSanPham'];
        if(isset($_POST["$name"])){
       
                for($j=0;$j<count($_SESSION['giohang']);$j++)
                {
	              if($_SESSION['giohang'][$j]['IDSanPham']==$_SESSION['giohang'][$i]['IDSanPham'])
	              {
					  //kiem tra con hang
					    if($kq['SoLuong']>0){
							$_SESSION['giohang'][$i]['SoLuong']+=1; 
					       //update so luong
					        updateSL($_SESSION['giohang'][$j]['IDSanPham'],1);
							header('location:giohang.php');
					        break;
							}
		   	           
	               }
                }
		}
		
	    //Giam so luong
		 if(isset($_POST["$namegiamsl"])){
             
                for($j=0;$j<count($_SESSION['giohang']);$j++)
                {
	              if($_SESSION['giohang'][$j]['IDSanPham']==$_SESSION['giohang'][$i]['IDSanPham'])
	              {
					  //kiem tra con hang
					    if($_POST['soluongSP']>1){
							$_SESSION['giohang'][$i]['SoLuong']-=1; 
					       //update so luong
					        updateSL($_SESSION['giohang'][$j]['IDSanPham'],-1);
					        break;
							}
		   	           
	               }
                }
		}
		
		?>
      <div class="thanh-tien"> 
        <!--Thành tiền = đơn giá * số lượng--> 
       <?php echo $_SESSION['giohang'][$i]['SoLuong']* $_SESSION['giohang'][$i]['GiaBan']; ?>
        </div>
        
      <div class="xoa-mathang"> 
      <form id="fm" name="fm" action="#" method="post" >
        <button type="submit" name="btnDeleteSP" value="Xoa" >Xóa</button>
        <img src="images/icon/delete.png" onclick="XoaGio()"/> 
      </form>
     
      </div>
      <?php
       
			if(isset($_POST['btnDeleteSP'])){
						
				for($k=0;$k<count($_SESSION['giohang']);$k++){
				
					  if($_SESSION['giohang'][$k]['IDSanPham']==$_SESSION['giohang'][$i]['IDSanPham']){
						  //cap nhat so luong san pham
						  updateSL($_SESSION['giohang'][$i]['IDSanPham'],$_SESSION['giohang'][$k]['SoLuong']);
						     //Giảm số phần tử bớt 1
								
								 if(count($_SESSION['giohang'])==1){
                                     unset($_SESSION['giohang'][$k]);
									 header('location:index.php');
										
			                       }
								 
								   unset($_SESSION['giohang'][$k]);
							      
									//echo "san pham cl= ".count($_SESSION['giohang']);
						  	       for($vt=$k; $vt<count($_SESSION['giohang'])-1; $vt++)
							       {  
			                            $_SESSION['giohang'][$vt] = $_SESSION['giohang'][$vt+1]; 
								   }
					         
						          break;			   
							
						  }
 
					}	
				
			}
		?>
      <?php }?>
      <form action="#" method="post">
       <input type="submit" value="Xóa giỏ" name="xoagio"/>
     </form>
      <?php 
	
	     //Xoa gio
		  if(isset($_POST['xoagio'])){
			  unset($_SESSION['giohang']);
			  }
				  
	  ?>
    </div>
    
     
    <?php //----------------------------------------------------------------------- ?>
    
    <div class="sp-dat-hang">
      <div id="tieuDe">Hóa đơn</div>
      <div id="tt-sp">
        <div class="tt-hd">Tạm tính:</div>
        <div class="gia">
        <?php
		  
			 echo $tamtinh ." VNĐ";
			?>
        </div>
      </div>
      <div id="giamgia-sp">
        <div class="tt-hd">Giảm giá:</div>
        <div class="gia">
          <?php 
	         if($tamtinh>50000000){
				 $giamgia=$tamtinh*0.05;
				 }
				 else $giamgia=0;
				  echo $giamgia." VNĐ";
	      ?>
        </div>
      </div>
      <div id="tong-tien">
        <div class="tt-hd">Tổng tiền:</div>
        <div class="gia" id="gia-tong">
            <?php 
	         echo $tamtinh-$giamgia." VNĐ";
	        ?>
        </div>
      </div>
	     
      <div id="btnDatHang">
    
          <a href="xacnhandiachi.php">Tiến hành đặt hàng</a>
      </div>
    </div>
  </div>
  <div id="footer">
    <?php include("footer.php"); ?>
  </div>
  
</div>

</body>

</html>