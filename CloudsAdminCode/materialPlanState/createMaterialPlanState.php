<?php
	include("../api/req.php");
	include("../api/selectMysql.php");
//连接数据库
	$create =$_POST['create'];
	$planId =$_POST['planId'];
	$createTime =$_POST['createTime'];
	$sql="INSERT INTO tbl_materialPlanState(`create`,planId,createTime)  VALUES('$create',$planId,$createTime);";
	$selcts = new SelectMysql();
	exit(json_encode($selcts -> insert($sql)));
?>