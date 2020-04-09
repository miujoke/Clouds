<?php
include("../api/db.php");

	$look = "
CREATE TABLE tbl_metarialList(
planId BIGINT PRIMARY KEY,
materialClassificationCode  VARCHAR(255),
materialClassificationName  VARCHAR(255),
materialCode BIGINT ,
materialName  VARCHAR(255) ,
specifications VARCHAR(255) ,
model VARCHAR(255),
company VARCHAR(255) ,
demandQuantity  BIGINT,
demandMonth  BIGINT ,
demandDate VARCHAR(255),
source VARCHAR(255),
expectedSupplier VARCHAR(255),
fixedSupplier VARCHAR(255),
remarks VARCHAR(255),
materialTrackingCode VARCHAR(255),
demandOrganization VARCHAR(255),
cascader VARCHAR(255)
);";
$Looking = $db -> query($look);
?>