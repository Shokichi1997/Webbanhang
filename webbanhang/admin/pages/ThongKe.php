
        <!-- Navigation -->

        <div id="page-wrapper">
       
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="width:150%">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
                            <div class="pull-right">
                                <div class="btn-group">
                                
                                    <form action="#" name="f" id="f" method="post">
                                       <input type="datetime" id="tungay" name="tungay" value="" placeholder="yyyy/mm/dd">
                                        </input>
                                        <input type="datetime" id="denngay" name="denngay" value="" placeholder="yyyy/mm/dd">
                                        </input>
                                        <input type="submit" name="tk" value="Thống kê"></input>
                                     </form>
                                                                           
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                                        <!-- /.THONG KE BAN HANG-->
<?php 
//index.php

$connect = mysqli_connect("localhost", "root", "", "webbanhang");

if(!isset($_POST['tk'])||is_null($tungay)||is_null($denngay))
{
$query = "SELECT NgayLap,COUNT(*),SUM(TongTien) FROM HoaDon Group By NgayLap";
}
else{
	$tungay= $_POST['tungay'];
    $denngay=$_POST['denngay'];
	date_parse($tungay);
	$query = "SELECT NgayLap,COUNT(*),SUM(TongTien) FROM HoaDon Group By NgayLap HAVING NgayLap>='$tungay' AND NgayLap<='$denngay' ";
	
	}
$result = mysqli_query($connect, $query);

$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ date:'".$row["NgayLap"]."', SoHD:".$row["COUNT(*)"].", TongTien:".$row["SUM(TongTien)"].",}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>


<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | How to use Morris.js chart with PHP & Mysql</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:auto;">
   <h2 align="center">Thống kê doanh số bán hàng</h2>
   <h3 align="center"></h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
 </body>
</html>

<script>
/*Area,Bar,Line*/
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'date',
 ykeys:['SoHD', 'TongTien', 'sale'],
 labels:['Số Hóa Đơn', 'Tổng tiền', 'Sale'],
 hideHover:'auto',
 /*stacked:true*/
});
</script>


                        <!-- /.panel-body -->
                    </div>
              
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->



