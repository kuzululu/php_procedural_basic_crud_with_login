<?php

require_once "inc/sessions.php";
include("inc/connection.php");

require_once "inc/shortLink.php";

require_once "controller/add.php";
require_once "controller/delete.php";
require_once "controller/update.php";

$search = $_GET["search"];

$sql = "SELECT * FROM tbl_information WHERE first_name LIKE '%$search%' || last_name LIKE '%$search%'";
$query = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<?php
// php codes
require_once "template-parts/head.php";
?>
<body>

<?php require_once "modal/modal.php"; ?>

<section id="main-page" class="mt-5">
<div class="container">
<div class="row mb-5">
<div class="col-md-4">
<form class="row" method="GET" action="result">

<div class="col-md-6 pe-0">
<input type="search" name="search" class="form-control">
</div>

<div class="col-md-6 pe-0">
<input type="submit" class="btn btn-outline-dark btn-sm mt-1" value="Search"> <a href="information" class="btn btn-outline-danger btn-sm mt-1" type="button">Reset</a>
</div>

</form>
</div>

<div class="col-md-8 text-end">
<a href="#" type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalAdd">Add New</a> <a href="logout" type="button" class="btn btn-outline-danger btn-sm">Logout</a>
</div>
</div> <!-- end of row -->

<div class="row">
<div class="col-md-12">
<div class="table-responsive">
<table class="table table-hover">
<thead>
<tr class="text-center">
	<th>No.</th>
	<th>First Name</th>
	<th>Middle Name</th>
	<th>Last Name</th>
	<th>Gender</th>
	<th>Birthdate</th>
	<th>Upload File</th>
	<th>Options</th>
</tr>
</thead>
<tbody>

<?php
$ctr = 1;
while ($row = $query->fetch_assoc()) {
	$origdate = $row["birthdate"];
	$datetime = new DateTime($origdate);
	$formatdate = $datetime->format("M d, Y");
?>

<tr class="text-center">
	<td><?= $ctr; ?></td>
	<td><?= $row["first_name"]; ?></td>
	<td><?= $row["middle_name"]; ?></td>
	<td><?= $row["last_name"]; ?></td>
	<td><?= $row["gender"]; ?></td>
	<td><?= $formatdate; ?></td>
	<td><a href="upload/<?= $row['upload_file']; ?>" class="text-success fw-bolder" target="_blank"><?= shortenLinkName($row["upload_file"]); ?></a></td>
	<td>
		<a href="#" id="<?= $row['id']; ?>" class="btn btn-outline-success btn-sm edit-retrieve" data-bs-toggle="modal" data-bs-target="#modalUpdate"><i class="fa-solid fa-underline"></i></a> <a href="#" id="<?= $row['id']; ?>" class="btn btn-outline-danger btn-sm del-retrieve" data-bs-toggle="modal" data-bs-target="#modalDelete"><i class="fa-solid fa-eraser"></i></a>
	</td>
</tr>
<?php
$ctr++;
}
?>
</tbody>
</table>
</div>
</div>
</div>

</div>	
</section>


<?php 
require_once "template-parts/bottom.php";
?>
</body>
</html>