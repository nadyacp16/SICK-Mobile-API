<?php 
	define('HOST','192.168.9.7');
	define('USER','sick');
	define('PASS','sick123456!');
	define('DB','db_atma');
	
	$con=mysqli_connect(HOST,USER,PASS,DB) or die('Unable to connect');
?>