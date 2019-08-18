<?php session_start(); ob_start();
if(isset($_COOKIE['taikhoan'])) {
    $_SESSION['username'] = $_COOKIE['taikhoan'];
    //Gia hạn cookie
    setcookie('taikhoan', $_SESSION['username'], time() + 60 * 60 * 10000);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="public/css/CSSCoban.css" rel="stylesheet" type="text/css"/>
<link href="public/css/header.css" rel="stylesheet" type="text/css" />
<link href="public/css/footer.css" rel="stylesheet" type="text/css" />

<title>Điện tử Product</title>
</head>

<body bgcolor="#CCCCCC">


<div id="container">
  <div id="header">
    <?php include("header.php"); ?>
    <div style="clear:both"></div>
  </div>
  <div id="body-menu">
    <?php include('menu.php');?>
    <div id="background">
      <div id="slider-chay">
        <figure> <img src="images/Banner/sld_1.jpg" /> <img src="images/Banner/sld_2.jpg" /> <img src="images/Banner/sld_3.jpg" /> <img src="images/Banner/sld_4.jpg" /> <img src="images/Banner/sld_5.jpg" /> </figure>
      </div>
    </div>
    <div class="cot-quangcao">
      <div class="item-quangcao"><img src="images/quangcao/100000_galaxy-j7-pro-1.jpg" /></div>
      <div class="item-quangcao"><img src="images/quangcao/canon-xf305.jpg" /></div>
    </div>
  </div>
  
  <div id="sanpham-noibat">
    <div id="tieuDe">
      <div id="chuLon">Sản phẩm nổi bật</div>
      <div id="chuThich">Hãy nhanh tay rinh những sản phẩm giá cực kỳ ưu đãi về nhà nào!</div>
    </div>
    <div id="locSanpham">
      <div class="dau-dsLoc"> Chọn loại hàng bạn quan tâm</div>
      <?php
		$sql="SELECT * FROM chungloai";
    	$ket_qua=mysqli_query($link,$sql);

	if (!$ket_qua) {
    die("Không thể thực hiện câu lệnh SQL: " . mysqli_error($connect));
    exit();
	} ?>
    
    <?php 
    function tonTai($value){
        $so = count($_SESSION['checkLoc']);
        for($i=0;$i<$so;$i++){
            if($value==$_SESSION['checkLoc'][$i]['idCL'])
                return(true);
        }
        return(false);
    }
    function tonTaiSS($value,$check){
        $so = count($check);
        for($i=0;$i<$so;$i++){
            if($value==$check[$i]){
               
                return(true);

            }
        }
        return(false);
    }

    if(!isset($_SESSION['checkLoc']))
        $_SESSION['checkLoc'] = array();
    if(!isset($checkboxes))
        $checkboxes = array();
    if(!isset($_GET['page'] ))
        $_SESSION['trangnow'] = 1;
    if(!isset($_GET['nhom']))
        $_SESSION['nhomnow'] = 1;

    $flagss = 0;
    if(isset($_GET['page'])){
        if($_SESSION['trangnow']!=$_GET['page']){
            $_SESSION['trangnow'] = $_GET['page'];
            $flagss = 1;
        }


    }
    if(isset($_GET['nhom'])) {
        if ($_SESSION['nhomnow'] != $_GET['nhom']) {
            $flagss = 1;
            $_SESSION['nhomnow'] = $_GET['nhom'];
        }

    }




    if(isset($_POST['check'])){
        $checkboxes = $_POST['check'];
    }
    else if($flagss == 1){
        $checkboxes = array();
        $size = count($_SESSION['checkLoc']);
        for ($i = 0; $i < $size; $i++) {
            $value = $_SESSION['checkLoc'][$i]['idCL'];
            $checkboxes[$i] = $value;
        }
    }
	?>
    
      <form action="" id="locSP-form" name="formloc" method="post" onchange="formloc.submit()">
        <ul>
          <?php 
			while($row=mysqli_fetch_array($ket_qua)){
			?>
          <li>
            <input type="checkbox" id="<?php echo $row['IDChungLoai']?>" name="check[]"
			<?php
            if(isset($checkboxes)){
                foreach($checkboxes as $value)
                    if($value == $row['IDChungLoai'])
                        echo 'checked = "checked"';
            }
                ?>
             value="<?php echo $row['IDChungLoai']?>"  onselect="formloc.submit()" />
            <label for="<?php echo $row['IDChungLoai']?>" ><span></span><?php echo $row['TenChungLoai'];?></label>
          </li>
          <?php } ?>
        </ul>
      </form>

        <?php
        foreach ($checkboxes as $value) {

            if (!tonTai($value)) {
                $so = count($_SESSION['checkLoc']);
                $_SESSION['checkLoc'][$so]['idCL'] = $value;
            }
        }
            $so = count($_SESSION['checkLoc']);
            for ($i = 0; $i < $so; $i++) {
                $value = $_SESSION['checkLoc'][$i]['idCL'];
                if (!tonTaiSS($value, $checkboxes)) {
                    for ($j = $i; $j < $so - 1; $j++) {
                        $_SESSION['checkLoc'][$j]['idCL'] = $_SESSION['checkLoc'][$j + 1]['idCL'];
                    }
                    unset($_SESSION['checkLoc'][--$so]);
                }
            }


        ?>


    </div>

    <!--Danh sách sản phẩm sau khi lọc-->
    <div id="listSanPham">
     <?php

	$slCheck = count($checkboxes);
	if($slCheck == 0)
		$sql="SELECT * FROM sanpham";
	else {
		$sql = "SELECT * FROM sanpham,loai where sanpham.idLoai = loai.idLoai ";
		$index = 0;
        foreach($checkboxes as $value){
			if($index == 0)
				$sql .= " and (loai.idChungLoai = '$value' ";
			else 
				$sql .= "OR loai.idChungLoai = '$value' ";
			if($index == ($slCheck-1)){
				$sql = $sql.') ORDER BY RAND()';
				break;
			}
            $index++;
		}
	}
	$numSP = 8;
	include ('phantrang.php');?>
    </div>

  </div>
  <div id="footer">
    <?php include("footer.php"); ?>
  </div>
</div>
<script type="text/javascript" src="public/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="public/js/events.js"></script>
</body>

</html>