<?php

if (isset($_POST["btnUpdate"])) {
	if (!empty($_POST["update_id"])) {
		$id = $conn->escape_string(trim($_POST["update_id"]));
		$update_fname = $conn->escape_string(trim($_POST["update_fname"]));
		$update_mname = $conn->escape_string(trim($_POST["update_mname"]));
		$update_lname = $conn->escape_string(trim($_POST["update_lname"]));
		$update_gender = $conn->escape_string(trim($_POST["update_gender"]));
		$update_bday = $conn->escape_string(trim($_POST["update_bday"]));
		$update_file = $_FILES["update_file"];

		if (!empty($update_file["name"])) {
			$origName = $update_file["name"];
			$ext = pathinfo($origName, PATHINFO_EXTENSION);
			$new_file = uniqid() . "_" . $origName;
			$destination = "upload/" . $new_file;

			while (file_exists($destination)) {
				$new_file = uniqid() . "_" . $origName;
				$destination = "upload/" . $new_file;
			}
				move_uploaded_file($update_file["tmp_name"], $destination);

				$sql = "UPDATE tbl_information SET first_name=?, middle_name=?, last_name=?, gender=?, birthdate=?, upload_file=? WHERE id=?";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("ssssssi", $update_fname, $update_mname, $update_lname, $update_gender, $update_bday, $new_file, $id);
				$stmt->execute();
				$stmt->close();

				echo "<script type='text/javascript' src='js/sweetalert2.all.min.js'></script>";
		echo "<script type='text/javascript'>
			document.addEventListener('DOMContentLoaded', ()=>{
				Swal.fire({
					title: 'Success',
					position: 'top-end',
					text: 'Successfully Updated',
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
				$sql = "UPDATE tbl_information SET first_name=?, middle_name=?, last_name=?, gender=?, birthdate=? WHERE id=?";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("sssssi", $update_fname, $update_mname, $update_lname, $update_gender, $update_bday, $id);
				$stmt->execute();
				$stmt->close();

				echo "<script type='text/javascript' src='js/sweetalert2.all.min.js'></script>";
		echo "<script type='text/javascript'>
			document.addEventListener('DOMContentLoaded', ()=>{
				Swal.fire({
					title: 'Success',
					position: 'top-end',
					text: 'Successfully Updated',
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
		}
	}
}

?>