<?php
	include("../api/req.php");
	include("../api/selectMysql.php");

//连接数据库
	$offset =$_POST['offset'];
	$count =$_POST['count'];
	$approvalState =$_POST['approvalState'];
	$headState =$_POST['headState'];
	$needState =$_POST['needState'];

	$sql="SELECT * FROM (select a.procureId,procureTime,procureName,planType,approvalState,a.`create`,a.createTime,headState,needState 
	from  
	tbl_procurePlan a 
	LEFT JOIN 
	tbl_procurePlanState b 
	on 
	a.procureId=b.procureId )
	c  
	WHERE 
	approvalState='$approvalState' ";
	if($headState== 2){
		$sql=$sql."AND headState = '$headState' ";
	}
	else{
		$sql=$sql."AND headState $headState ";
	}
	if($needState==''){
		
	}
	else{
		$sql=$sql."AND needState $needState";
	}
	$sql=$sql." limit {$offset},{$count} ";
//exit($sql);

	$selcts = new SelectMysql();
	exit(json_encode($selcts -> select($sql)));
?>