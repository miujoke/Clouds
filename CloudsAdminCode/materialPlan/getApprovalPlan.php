<?php
	include("../api/req.php");
	include("../api/selectMysql.php");
//连接数据库
	$count=$_POST['count'];
	$offset=$_POST['offset'];
	$approvalState=$_POST['approvalState'];
	$headState=$_POST['headState'];
	$needState=$_POST['needState'];
	$sql="SELECT * FROM (select a.planId,planName,planType,approvalState,needDepartment,needPeoName,planMonth,headState,needState 
	from  
	tbl_materialPlan a 
	LEFT JOIN 
	tbl_materialPlanState b 
	on 
	a.planId=b.planId )
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
	$sql=$sql." limit {$offset},{$count}";
//exit($sql);

	$selcts = new SelectMysql();
	
	exit(json_encode($selcts -> select($sql)));
?>