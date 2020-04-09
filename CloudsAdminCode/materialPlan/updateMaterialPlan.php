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
	$sql="UPDATE tbl_materialPlan SET  planType='$planType',planName='$planName',needDepartment='$needDepartment',needPeoName='$needPeoName',
	needType='$needType',planMonth=$planMonth WHERE planId= $planId;";
	$selcts = new SelectMysql();
	exit(json_encode($selcts -> insert($sql)));
?>