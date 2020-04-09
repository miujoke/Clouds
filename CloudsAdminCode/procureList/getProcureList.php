<?php
	include("../api/req.php");
	include("../api/selectMysql.php");

	$procureId =$_POST['procureId'];
	$sql="SELECT *  FROM ( select a.materialTrackingCode, b.transport,b.available,b.occupy,b.total from tbl_procurelist a   inner join  tbl_stocklist b on a.materialCode=b.materialCode  where procureId=$procureId ) c inner join  tbl_metariallist d on c.materialTrackingCode=d.materialTrackingCode ;";
//exit($sql);
	$selcts = new SelectMysql();
	
	exit(json_encode($selcts -> select($sql)));
?>