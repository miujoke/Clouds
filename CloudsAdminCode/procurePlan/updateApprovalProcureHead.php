<?php
	include("../api/req.php");
	include("../api/selectMysql.php");

//连接数据库
	$approvalState =$_POST['approvalState'];
	$procureId =$_POST['procureId'];
	$approvalHead=$_POST['approvalHead'];
	$approvalHeadRemarks=$_POST['approvalHeadRemarks'];
	$headState=$_POST['headState'];
	$approvalHeadTime=$_POST['approvalHeadTime'];//
	$sql1=" 
			update tbl_procurePlanState set approvalHead='$approvalHead',approvalHeadRemarks='$approvalHeadRemarks',headState='$headState', approvalHeadTime=$approvalHeadTime  where procureId=$procureId ;";
	$sql2="update tbl_procurePlan set approvalState='$approvalState' where procureId =$procureId ;";
//exit($sql1);
	$selcts = new SelectMysql();
	

	exit(json_encode($selcts -> insert($sql1),$selcts -> insert($sql2)));
?>