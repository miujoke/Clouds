<?php
	include("../api/req.php");
	include("../api/selectMysql.php");
//连接数据库
	$materialCode =$_POST['materialCode'];
	$materialTrackingCode =$_POST['materialTrackingCode'];
	$procureId   =$_POST['procureId'];
	
	$sql="INSERT INTO tbl_procureList(materialCode,materialTrackingCode,procureId)       VALUES($materialCode,'$materialTrackingCode',$procureId);";
	$selcts = new SelectMysql();
	exit(json_encode($selcts -> insert($sql)));
?>