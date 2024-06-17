<?php

include("inc/connection.php");

if (isset($_POST["update_id"])) {
	$id = $_POST["update_id"];
	$query = "SELECT * FROM tbl_information WHERE id = '$id'";
	$get = $conn->query($query);
	$row = $get->fetch_assoc();
	echo json_encode($row);
}


if (isset($_POST["del_id"])) {
	$id = $_POST["del_id"];
	$query = "SELECT * FROM tbl_information WHERE id = '$id'";
	$get = $conn->query($query);
	$row = $get->fetch_assoc();
	echo json_encode($row);
}
?>