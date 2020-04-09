<?php
	include("../api/req.php");
	include("../api/selectMysql.php");
//连接数据库
	$planType =$_POST['planType'];
	$procureName   =$_POST['procureName'];
	$procureTime =$_POST['procureTime'];
	$procureId   =$_POST['procureId'];
	$createTime =$_POST['createTime'];
	$create =$_POST['create'];
	$sql="INSERT INTO tbl_procurePlan(planType,procureName,procureTime,procureId,createTime,`create`,planState,approvalState)       VALUES('$planType','$procureName',$procureTime,$procureId,$createTime,'$create','4','1') ;";
	$selcts = new SelectMysql();

	exit(json_encode($selcts -> insert($sql)));
?>