<?php
include("../api/db.php");

	$look = "
CREATE TABLE tbl_procurePlanChangeState(
planId   BIGINT  PRIMARY KEY,
revise     VARCHAR(255),
reviseTime   BIGINT,
reviseRemarks  VARCHAR(255)
);";
$Looking = $db -> query($look);
?>