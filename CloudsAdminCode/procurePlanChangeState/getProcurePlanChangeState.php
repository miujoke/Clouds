<?php
	include("../api/req.php");
	include("../api/selectMysql.php");

	$procureId  =$_POST['procureId  '];
	$sql="SELECT * FROM tbl_procurePlanChangeState  where procureId  = {$procureId};";

	$selcts = new SelectMysql();
	
	exit(json_encode($selcts -> select($sql)));
?>