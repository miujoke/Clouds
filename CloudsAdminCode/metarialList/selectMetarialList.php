<?php
	include("../api/req.php");
	include("../api/selectMysql.php");
//连接数据库
	$planId =$_POST['planId'];
	$demandMonth  =$_POST['demandMonth'];
	
	
	$sql="SELECT * FROM tbl_metarialList  WHERE planId='$planId' ";
//AND demandMonth like '$demandMonth%'
	$selcts = new SelectMysql();
	exit(json_encode($selcts -> select($sql)));
?>