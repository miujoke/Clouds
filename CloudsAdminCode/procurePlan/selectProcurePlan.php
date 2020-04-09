<?php
	include("../api/req.php");
	include("../api/selectMysql.php");
//连接数据库
	$procureName  =$_POST['procureName'];
	$planType  =$_POST['planType'];
	$procureId   =$_POST['procureId'];
	
	
	$sql="SELECT * FROM tbl_procurePlan WHERE ";
	if($procureId!=0){
		$sql=$sql."procureId=$procureId AND";
	};

	if($planType!="0"){
		$sql=$sql." planType='$planType' AND" ;
	};
	if($procureName!="0"){
		$sql=$sql." procureName like '%$procureName%'" ;
	}else{
		$sql=substr($sql, 0, -3);//删除后三位字符
	};
	$selcts = new SelectMysql();
	exit(json_encode($selcts -> select($sql)));
?>