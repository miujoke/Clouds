<?php
include("../api/db.php");

	$look = "
CREATE TABLE tbl_procureList(
materialCode  BIGINT ,
materialTrackingCode  BIGINT PRIMARY KEY,
procureId  BIGINT 
);";
$Looking = $db -> query($look);
?>