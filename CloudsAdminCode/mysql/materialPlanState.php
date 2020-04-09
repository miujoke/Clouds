<?php
include("../api/db.php");

	$look = "
CREATE TABLE tbl_materialPlanState(
planId  BIGINT  PRIMARY KEY, 
`create`  VARCHAR(255),
createTime  BIGINT,
approvalHead VARCHAR(255) ,
approvalHeadTime  BIGINT ,
approvalHeadRemarks VARCHAR(255),
approvalNeed VARCHAR(255) ,
approvalNeedTime BIGINT ,
approvalNeedRemarks VARCHAR(255) ,
headState VARCHAR(255) ,
needState VARCHAR(255) 
);";
$Looking = $db -> query($look);
?>