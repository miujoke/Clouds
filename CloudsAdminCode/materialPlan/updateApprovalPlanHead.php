<?php
	include("../api/req.php");
	include("../api/selectMysql.php");

//连接数据库
	$approvalState =$_POST['approvalState'];
	$planId =$_POST['planId'];
	$approvalHead=$_POST['approvalHead'];
	$approvalHeadRemarks=$_POST['approvalHeadRemarks'];
	$headState=$_POST['headState'];
	$approvalHeadTime=$_POST['approvalHeadTime'];//
	$sql1=" 
			update tbl_materialPlanState set approvalHead='$approvalHead',approvalHeadRemarks='$approvalHeadRemarks',headState='$headState', approvalHeadTime=$approvalHeadTime  where planId=$planId ;";
	$sql2="update tbl_materialPlan set approvalState='$approvalState' where planId=$planId;";
//exit($sql);
	$selcts = new SelectMysql();
	

	exit(json_encode($selcts -> insert($sql1),$selcts -> insert($sql2)));
?>