<?php

if (isset($_POST["btnRegister"])) {
	$username = $conn->escape_string(trim($_POST["username"]));
	$password = $conn->escape_string(trim($_POST["password"]));
	$email = $conn->escape_string(trim($_POST["email"]));

	// optional 
	$check_user = "SELECT * FROM tbl_users WHERE username = '$username'";
	$check_email = "SELECT * FROM tbl_users WHERE email = '$email'";

	$check_user_row = $conn->query($check_user);
	$check_email_row = $conn->query($check_email);

	// get total information
	$total_user_row = $check_user_row->num_rows;
	$total_email_row = $check_email_row->num_rows;

	if ($total_user_row > 0 || $total_email_row > 0) {
		echo "<script type='text/javascript' src='js/sweetalert2.all.min.js'></script>";
		echo "<script type='text/javascript'>
			document.addEventListener('DOMContentLoaded', ()=>{
				Swal.fire({
					title: 'Error',
					position: 'top-end',
					text: 'email or username existing',
					icon: 'error',
					allowOutsideClick: false,
					allowEscapeKey: false,
					showConfirmButton: false,
				});
				setTimeout(()=>{
					window.location.href = window.location.href;
				},1000);
			});
		</script>";
	}else{
		// password encrypted
		$hash = password_hash($password, PASSWORD_BCRYPT);

		$sql = "INSERT INTO tbl_users(username, password, email) VALUES (?,?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("sss", $username, $hash, $email);
		$stmt->execute();
		$stmt->close();

			echo "<script type='text/javascript' src='js/sweetalert2.all.min.js'></script>";
		echo "<script type='text/javascript'>
			document.addEventListener('DOMContentLoaded', ()=>{
				Swal.fire({
					title: 'Success',
					position: 'top-end',
					text: 'Register Complete',
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

?>