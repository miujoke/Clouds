<?php
	include("../api/req.php");
	include("../api/selectMysql.php");
//连接数据库
	$planType =$_POST['planType'];
	$planId =$_POST['planId'];
	$planName  =$_POST['planName'];
	$needDepartment =$_POST['needDepartment'];
	$needPeoName  =$_POST['needPeoName'];
	$needType =$_POST['needType'];
	$planMonth =$_POST['planMonth'];
	$sql="INSERT INTO tbl_materialPlan(planType,planId,planName,needDepartment,needPeoName,needType,planMonth,planState,approvalState)       VALUES('$planType',$planId,'$planName','$needDepartment','$needPeoName','$needType',$planMonth,'4','1') ;";
//exit($sql);
	$selcts = new SelectMysql();
	exit(json_encode($selcts -> insert($sql)));
?>