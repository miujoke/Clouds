<?php
	include("../api/req.php");
	include("../api/selectMysql.php");
//连接数据库
	$planId =$_POST['planId'];
	$approvalState  =$_POST['approvalState'];
	$planState =$_POST['planState'];
	$sql="UPDATE tbl_materialPlan SET planState='$planState',approvalState='$approvalState' WHERE planId= $planId;";
	$selcts = new SelectMysql();
	exit(json_encode($selcts -> insert($sql)));
?>