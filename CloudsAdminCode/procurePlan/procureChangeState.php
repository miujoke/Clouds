<?php
	include("../api/req.php");
	include("../api/selectMysql.php");

//连接数据库
	$approvalState  =$_POST['approvalState'];
	$planState =$_POST['planState'];
	$procureId =$_POST['procureId'];
	
	$sql="update tbl_procurePlan set approvalState='$approvalState',planState='$planState' where procureId=$procureId;";
	$selcts = new SelectMysql();
	exit(json_encode($selcts -> insert($sql)));
?>