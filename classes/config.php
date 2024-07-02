<?php 
	$host= 'localhost';
	$dbUser= 'root';
	$dbPass= '';
	$dbName= 'bsave';
	$dbConn=mysqli_connect($host, $dbUser, $dbPass);
	
	if (!$dbConn){
		die("Can't connect to server");
	} 

	if (!mysqli_select_db($dbConn,$dbName)){
		die("Can't select database");
	}
	mysqli_query($dbConn,"SET NAMES 'UTF8'");
 ?>