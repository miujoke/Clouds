<?php
	include("../api/req.php");
	include("../api/selectMysql.php");
//连接数据库
	$planId =$_POST['planId'];
	$revise =$_POST['revise'];
	$reviseTime =$_POST['reviseTime'];
	$reviseRemarks =$_POST['reviseRemarks'];
	$sql="INSERT INTO tbl_materialPlanState(revise,planId,reviseTime,reviseRemarks)  VALUES('$revise',$planId,$reviseTime,'$reviseRemarks');";
	$selcts = new SelectMysql();
	exit(json_encode($selcts -> insert($sql)));
?>