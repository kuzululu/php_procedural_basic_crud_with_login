<?php

if (isset($_POST["btnDelete"])) {
	if (isset($_POST["del_id"])) {
		$id = $_POST["del_id"];
		$sql = "DELETE FROM tbl_information WHERE id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("i", $id);
		$rs = $stmt->execute();

		if ($rs === true) {
		echo "<script type='text/javascript' src='js/sweetalert2.all.min.js'></script>";
		echo "<script type='text/javascript'>
			document.addEventListener('DOMContentLoaded', ()=>{
				Swal.fire({
					title: 'Success',
					position: 'top-end',
					text: 'Successfully Deleted',
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