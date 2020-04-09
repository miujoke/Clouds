<?php
	include("../api/req.php");
	include("../api/selectMysql.php");
//连接数据库
	$planType =$_POST['planType'];
	$planId =$_POST['planId'];
	$planName  =$_POST['planName'];
	$needDepartment =$_POST['needDepartment'];
	$planMonth =$_POST['planMonth'];
	$offset  =$_POST['offset'];
	$count =$_POST['count'];
	
	$sql="SELECT * FROM tbl_materialPlan WHERE ";
	if($planId!=0){
		$sql=$sql."planId=$planId AND";
	};

	if($planType!="0"){
		$sql=$sql." planType='$planType' AND" ;
	};
	if($planMonth!=0){
		$sql=$sql." planMonth like '$planMonth%' AND" ;
	};
	if($needDepartment!="0"){
		$sql=$sql." needDepartment='$needDepartment' AND" ;
	};
	if($planName!="0"){
		$sql=$sql." planName like '%$planName%'" ;
	}else{
		$sql=substr($sql, 0, -3);//删除后三位字符
	};
	$sql=$sql." limit {$offset},{$count};";

	$selcts = new SelectMysql();
	exit(json_encode($selcts -> select($sql)));
?>