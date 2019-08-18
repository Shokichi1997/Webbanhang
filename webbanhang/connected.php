<?php 
	$link=mysqli_connect("localhost","root","","webbanhang");
 	if(!$link){
	 	die("Không kết nối :" . mysqli_connect_error());
   		exit();
	 }
mysqli_query($link,"set names 'utf8'");

?>