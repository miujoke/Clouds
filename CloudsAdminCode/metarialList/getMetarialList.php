<?php
	include("../api/req.php");
	include("../api/selectMysql.php");
//连接数据库
	$planId=$_POST['planId'];
	$sql="SELECT * FROM tbl_metarialList where planId={$planId};";
	$selcts = new SelectMysql();
	exit(json_encode($selcts -> select($sql)));
?>