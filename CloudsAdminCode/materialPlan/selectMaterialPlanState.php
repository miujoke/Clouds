<?php
	include("../api/req.php");
	include("../api/selectMysql.php");
//连接数据库
	$planState =$_POST['planState'];
	$planMonth  =$_POST['planMonth'];
	
	
	$sql="SELECT planId FROM tbl_materialPlan  WHERE planState='$planState' AND planMonth like '$planMonth%'";
//exit($sql);
	$selcts = new SelectMysql();
	exit(json_encode($selcts -> select($sql)));
?>