<?php

if (isset($_POST["btnEntry"])) {
	$entry_lname = $conn->escape_string(trim($_POST["entry_lname"]));
	$entry_fname = $conn->escape_string(trim($_POST["entry_fname"]));
	$entry_mname = $conn->escape_string(trim($_POST["entry_mname"]));
	$entry_gender = $conn->escape_string(trim($_POST["entry_gender"]));
	$entry_bday = $conn->escape_string(trim($_POST["entry_bday"]));
	$entry_file = $_FILES["entry_file"];

	if (!empty($entry_file["name"])) {
		
		$origName = $entry_file["name"];
		$extName = pathinfo($origName, PATHINFO_EXTENSION);
		$newFileName = uniqid() . "_" . $origName;
		$destination = "upload/" . $newFileName;

		while (file_exists($destination)) {
		$newFileName = uniqid() . "_" . $origName;
		$destination = "upload/" . $newFileName;
		}

		move_uploaded_file($entry_file["tmp_name"], $destination);

		$sql = "INSERT INTO tbl_information(first_name, middle_name, last_name, gender, birthdate, upload_file) VALUES (?,?,?,?,?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ssssss", $entry_fname, $entry_mname, $entry_lname, $entry_gender, $entry_bday, $newFileName);
		$stmt->execute();
		$stmt->close();
		echo "<script type='text/javascript' src='js/sweetalert2.all.min.js'></script>";
		echo "<script type='text/javascript'>
			document.addEventListener('DOMContentLoaded', ()=>{
				Swal.fire({
					title: 'Success',
					position: 'top-end',
					text: 'Successfully Added',
					icon: 'success',
					allowOutsideClick: false,
					allowEscapeKey: false,
					showConfirmButton: false
				});
				setTimeout(()=>{
					window.location.href = window.location.href;
				},1000);
			});
		</script>";
	}else{
			$sql = "INSERT INTO tbl_information(first_name, middle_name, last_name, gender, birthdate) VALUES (?,?,?,?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("sssss", $entry_fname, $entry_mname, $entry_lname, $entry_gender, $entry_bday);
		$newFileName = NULL;
		$stmt->execute();
		$stmt->close();
		echo "<script type='text/javascript' src='js/sweetalert2.all.min.js'></script>";
		echo "<script type='text/javascript'>
			document.addEventListener('DOMContentLoaded', ()=>{
				Swal.fire({
					title: 'Success',
					position: 'top-end',
					text: 'Successfully Added',
					icon: 'success',
					allowOutsideClick: false,
					allowEscapeKey: false,
					showConfirmButton: false
				});
				setTimeout(()=>{
					window.location.href = window.location.href;
				}, 1000);
			});
		</script>";
	}
}

?>