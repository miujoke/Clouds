<?php
	include("../api/req.php");
	include("../api/selectMysql.php");

//连接数据库
	$approvalState =$_POST['approvalState'];
	$planId =$_POST['planId'];
	$approvalNeed=$_POST['approvalNeed'];
	$approvalNeedRemarks=$_POST['approvalNeedRemarks'];
	$needState=$_POST['needState'];
	$approvalNeedTime=$_POST['approvalNeedTime'];//
	$sql1=" 
			update tbl_materialPlanState set approvalNeed='$approvalNeed',approvalNeedRemarks='$approvalNeedRemarks',needState='$needState', approvalNeedTime=$approvalNeedTime  where planId=$planId ;";
	$sql2="update tbl_materialPlan set approvalState='$approvalState' where planId=$planId;";
//exit($sql);
$sql3="";
if($approvalState=="2"){
	$sql3=$sql3."update tbl_materialPlan set planState='2' where planId=$planId;";
}
	$selcts = new SelectMysql();
	

	exit(json_encode($selcts -> insert($sql1),$selcts -> insert($sql2),$selcts -> insert($sql3)));
?>