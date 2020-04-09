<?php
	include("../api/req.php");
	include("../api/selectMysql.php");
//连接数据库
	$count=$_POST['count'];
	$offset=$_POST['offset'];
	$sql="SELECT * FROM tbl_materialPlan  limit {$offset},{$count} ;";
	$selcts = new SelectMysql();
	
	exit(json_encode($selcts -> select($sql)));
?>