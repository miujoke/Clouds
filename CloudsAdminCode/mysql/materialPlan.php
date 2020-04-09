<?php
//连接数据库
	include("../api/db.php");


	$look = "
CREATE TABLE tbl_materialPlan(
planId  BIGINT  PRIMARY KEY, 
planType  VARCHAR(255),
planName  VARCHAR(255),
needDepartment VARCHAR(255),
needPeoName  VARCHAR(255),
planState VARCHAR(255),
approvalState VARCHAR(255),
needType VARCHAR(255),
planMonth BIGINT
);";
	$LooK = $db -> query($look);

 
?>