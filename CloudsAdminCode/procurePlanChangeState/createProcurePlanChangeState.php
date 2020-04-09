<?php
	include("../api/req.php");
	include("../api/selectMysql.php");
//连接数据库
	$procureId  =$_POST['procureId'];
	$revise  =$_POST['revise'];
	$reviseTime   =$_POST['reviseTime'];
	$reviseRemarks = $_POST['reviseRemarks'];
	
	$sql="INSERT INTO tbl_procurePlanChangeState(procureId,revise,reviseTime,reviseRemarks)  VALUES($procureId,'$revise',$reviseTime,'$reviseRemarks');";
	$selcts = new SelectMysql();
	exit(json_encode($selcts -> insert($sql)));
?>