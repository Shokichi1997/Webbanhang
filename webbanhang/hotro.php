<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="public/css/CSSCoban.css" rel="stylesheet" type="text/css"/>
<link href="public/css/header.css" rel="stylesheet" type="text/css" />
<link href="public/css/footer.css" rel="stylesheet" type="text/css" />
<title>Untitled Document</title>
</head>

<body bgcolor="#CCCCCC">
<div id="container">
  <?php include("header.php")?>
  
  <?php if(isset($_GET['pages'])){
	$pages = $_GET['pages'];
	if($pages == 'cau-hoi-thuong-gap'){?>
    
    
  <!--Phần code Các câu hỏi thường gặp--------------->
  <div class="cauHoi">
    <div class="tieude-CauHoi"></div>
    <div class="timkiem-cauhoi" style=" width:600px;margin:0 auto; margin-bottom:100px;">
      <form action="" method="get" name="tim-cauhoi" >
        <input type="text" class="txtTimKiem" name="search-box" placeholder="Tìm kiếm câu hỏi..."/>
        <button id="btnSearch" type="submit"><img src="images/search.png" width="40px" height="40px"/></button>
      </form>
    </div>
    <div class="cauhoi">
      <div class="box-cauhoi">
        <div class="chude-cauhoi"><img src="" />Tôi là khách hàng mới</div>
        <div class="ds-cauhoi">
          <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
          </ul>
        </div>
      </div>
      <div class="box-cauhoi"></div>
    </div>
     </div>
    <!--Kêt thúc trang các câu hỏi thường gặp---------->
    
    
    
    <?php }else if($pages == 'yeu-cau-ho-tro'){?>
    <!--Phần code Gửi yêu cầu hỗ trợ------------------->
    <div class="GiupDo">
    	
    </div>
    <!--Kết thúc code Gửi yêu cầu hỗ trợ------------------->
    
    
    <?php }else if($pages == 'phuong-thuc-van-chuyen'){?>
    <!--Phần code Phương thức vận chuyển------------------->
    <div class="ptVanChuyen"></div>
    <!--Kết thúc Phương thức vận chuyển------------------->
    
    
    <?php }else if($pages == 'phuong-thuc-doi-tra'){?>
    <!--Phần code Phương thức đổi trả------------------->
    <div class="ptDoiTra"></div>
    <!--Kết thúc Phương thức đổi trả------------------->
    
    
    <div style="clear:both"></div>
    <?php }}?>
    <?php include("footer.php"); ?>

</div>
</body>
</html>