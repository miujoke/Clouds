<?php
	include("../api/req.php");
	include("../api/selectMysql.php");
//连接数据库
	$create =$_POST['create'];
	$procureId  =$_POST['procureId'];
	$createTime   =$_POST['createTime'];
	
	$sql="INSERT INTO tbl_procurePlanState(`create`,procureId,createTime)  VALUES('$create',$procureId,$createTime) ;";
	$selcts = new SelectMysql();
	exit(json_encode($selcts -> insert($sql)));
?>