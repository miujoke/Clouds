<?php
	include("../api/req.php");
	include("../api/selectMysql.php");

//连接数据库
	$approvalState =$_POST['approvalState'];
	$procureId =$_POST['procureId'];
	$approvalNeed=$_POST['approvalNeed'];
	$approvalNeedRemarks=$_POST['approvalNeedRemarks'];
	$needState=$_POST['needState'];
	$approvalNeedTime=$_POST['approvalNeedTime'];//
	$sql1=" 
			update tbl_procurePlanState set approvalNeed='$approvalNeed',approvalNeedRemarks='$approvalNeedRemarks',needState='$needState', approvalNeedTime=$approvalNeedTime  where procureId=$procureId ;";
	$sql2="update tbl_procurePlan set approvalState='$approvalState' where procureId=$procureId;";
//exit($sql);
	$sql3="";
if($approvalState=="2"){
	$sql3=$sql3."update tbl_procurePlan set planState='2' where procureId=$procureId;";
}
	$selcts = new SelectMysql();
	

	exit(json_encode($selcts -> insert($sql1),$selcts -> insert($sql2),$selcts -> insert($sql3)));
?>