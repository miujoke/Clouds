<?php
include("../api/db.php");

	$look = "
CREATE TABLE tbl_procurePlan(
procureName VARCHAR(255) ,
planType  BIGINT,
procureTime BIGINT,
procureId  VARCHAR(255) PRIMARY KEY,
approvalState  VARCHAR(255),
planState VARCHAR(255),
createTime BIGINT,
`create` VARCHAR(255)
);";
$Looking = $db -> query($look);
?>