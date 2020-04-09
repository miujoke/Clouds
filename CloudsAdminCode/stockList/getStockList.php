<?php
	include("../api/req.php");
	include("../api/selectMysql.php");
//连接数据库

	
	$sql="SELECT * FROM tbl_stockList ;";
	$selcts = new SelectMysql();
	
	exit(json_encode($selcts -> select($sql)));
?>