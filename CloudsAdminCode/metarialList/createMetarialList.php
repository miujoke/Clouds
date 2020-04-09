<?php
	include("../api/req.php");
	include("../api/selectMysql.php");
//连接数据库
	$planId =$_POST['planId'];
	$materialClassificationCode =$_POST['materialClassificationCode'];
	$materialClassificationName =$_POST['materialClassificationName'];
	$materialCode =$_POST['materialCode'];
	$materialName =$_POST['materialName'];
	$specifications  =$_POST['specifications'];
	$model =$_POST['model'];
	$company =$_POST['company'];
	$demandQuantity =$_POST['demandQuantity'];
	$demandMonth =$_POST['demandMonth'];
	$demandDate =$_POST['demandDate'];
	$source =$_POST['source'];
	$expectedSupplier =$_POST['expectedSupplier'];
	$fixedSupplier =$_POST['fixedSupplier'];
	$remarks =$_POST['remarks'];
	$materialTrackingCode =$_POST['materialTrackingCode'];
	$demandOrganization =$_POST['demandOrganization'];
	$cascader =$_POST['cascader'];

	$sql="INSERT INTO 
	tbl_metarialList
	(planId,materialClassificationCode,materialClassificationName,materialCode,
	materialName,specifications,model,company,demandQuantity,demandMonth,demandDate,
	source,expectedSupplier,fixedSupplier,remarks,materialTrackingCode,demandOrganization,cascader)
	VALUES
	($planId,'$materialClassificationCode','$materialClassificationName',$materialCode,
	'$materialName','$specifications','$model','$company',$demandQuantity,$demandMonth,$demandDate,
	'$source','$expectedSupplier','$fixedSupplier','$remarks','$materialTrackingCode','$demandOrganization','$cascader');";
//exit($sql);	
$selcts = new SelectMysql();
	exit(json_encode($selcts -> insert($sql)));
?>