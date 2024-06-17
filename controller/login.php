<?php


if (isset($_POST["btnLogin"])) {
	$userLog = $conn->escape_string(trim($_POST["userLog"]));
	$passLog = $conn->escape_string(trim($_POST["passLog"]));

	$sql = "SELECT * FROM tbl_users WHERE username = '$userLog'";

	// store result
	$user = $conn->query($sql) or die($conn->error);
	$total_user = $user->num_rows;

	if ($total_user > 0) {
		// fetch data each table row
		while ($row = $user->fetch_assoc()) {
			$user_id = $row["user_id"];
			$db_user = $row["username"];
			$db_pass = $row["password"];
			$db_email = $row["email"];

			if (password_verify($passLog, $db_pass)) {
				$_SESSION["user_id"] = $user_id;
				$_SESSION["username"] = $db_user;
				header("location: information");
			}else{
		echo "<script type='text/javascript' src='js/sweetalert2.all.min.js'></script>";
		echo "<script type='text/javascript'>
			document.addEventListener('DOMContentLoaded', ()=>{
				Swal.fire({
					title: 'Error',
					position: 'top-end',
					text: 'Incorrect Password',
					icon: 'error',
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
	}else{
		echo "<script type='text/javascript' src='js/sweetalert2.all.min.js'></script>";
		echo "<script type='text/javascript'>
			document.addEventListener('DOMContentLoaded', ()=>{
				Swal.fire({
					title: 'Error',
					position: 'top-end',
					text: 'No Username Found',
					icon: 'error',
					allowOutsideClick: false,
					allowEscapeKey: false,
					showConfirmButton: false
				});
				setTimeout(()=>{
					window.location.href = window.location.href;
				});
			});
		</script>";
	}
}

?>