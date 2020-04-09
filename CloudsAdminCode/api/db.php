<?php 
	
//连接数据库
	$host = '127.0.0.1';
	$user = 'root';
	$pwd = 'root';
	$dbname = 'materialplan';
	$db = new mysqli($host,$user,$pwd,$dbname);
	$db -> query("SET NAMES UTF8");
?>