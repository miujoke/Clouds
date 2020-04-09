<?php
include("../api/db.php");

	$look1 = "create database materialplan charset='utf8';";
	$look2 = "use materialplan;";
$Looking = $db -> query($look1);
$Looking = $db -> query($look2);
?>