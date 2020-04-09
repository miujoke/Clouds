<?php
	include("../api/req.php");
	include("../api/selectMysql.php");
//连接数据库
	$materialClassificationCode=$_POST['materialClassificationCode'];
	$materialClassificationName=$_POST['materialClassificationName'];
	$materialName=$_POST['materialName'];
	$materialCode=$_POST['materialCode'];
	$specifications=$_POST['specifications'];
	$company=$_POST['company'];
	$model=$_POST['model'];
	$sql="INSERT INTO  tbl_stockList(
	materialClassificationCode,materialClassificationName,materialName,materialCode,specifications,company,model,transport,available,occupy,total)  
	VALUES(
'$materialClassificationCode','$materialClassificationName','$materialName',$materialCode,'$specifications','$company','$model',100,450,150,500);";
	$selcts = new SelectMysql();
	
	exit(json_encode($selcts -> insert($sql)));
?>