<?php
	include("../api/req.php");
	include("../api/selectMysql.php");

//连接数据库
	$procureName =$_POST['procureName'];
	$planType =$_POST['planType'];
	$procureTime=$_POST['procureTime'];
	$sql=" update tbl_procurePlan set procureName='$procureName',procureTime=$procureTime,planType=$planType ";
	$selcts = new SelectMysql();
	exit(json_encode($selcts -> insert($sql)));
?>