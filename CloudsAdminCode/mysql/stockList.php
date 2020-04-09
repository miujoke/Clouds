<?php
include("../api/db.php");

	$look = "
CREATE TABLE tbl_stockList(
materialClassificationCode  VARCHAR(255),
materialClassificationName     VARCHAR(255),
materialCode   BIGINT  PRIMARY KEY,
materialName  VARCHAR(255),
specifications  VARCHAR(255), 
model VARCHAR(255),
company VARCHAR(255),
transport BIGINT,
available BIGINT,
occupy BIGINT,
total BIGINT 
);";
$Looking = $db -> query($look);
?>
