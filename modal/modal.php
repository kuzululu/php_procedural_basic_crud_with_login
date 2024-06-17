<div class="modal fade" id="modalAdd" aria-hidden="true" tabindex="-1">

<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header">
<h3 class="text-uppercase text-primary fw-bolder modal-title animate__animated animate__fadeIn animate__infinite infinite animate__slow">Entry</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body">
<form class="row needs-validation" novalidate="" enctype="multipart/form-data" method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">

<div class="col-md-4 mb-3">
<label class="fw-bolder">First Name</label>
<div class="input-group">
	<span class="input-group-text bg-info bg-gradient"><i class="text-light fa fa-user"></i></span>
	<input type="text" name="entry_fname" class="form-control" required="">
	<small class="text-danger invalid-feedback">Input blank Fields</small>
</div>
</div>

<div class="col-md-4 mb-3">
<label class="fw-bolder">Middle Name</label>
<div class="input-group">
	<span class="input-group-text bg-info bg-gradient"><i class="text-light fa fa-user"></i></span>
	<input type="text" name="entry_mname" class="form-control" required="">
	<small class="text-danger invalid-feedback">Input blank Fields</small>
</div>
</div>

<div class="col-md-4 mb-3">
<label class="fw-bolder">Last Name</label>
<div class="input-group">
	<span class="input-group-text bg-info bg-gradient"><i class="text-light fa fa-user"></i></span>
	<input type="text" name="entry_lname" class="form-control" required="">
	<small class="text-danger invalid-feedback">Input blank Fields</small>
</div>
</div>

<div class="col-md-4 mb-3">
<label class="fw-bolder">Gender</label>
<div class="input-group">
	<span class="input-group-text bg-info bg-gradient"><i class="fa fa-transgender text-light"></i></span>
	<select class="form-control" name="entry_gender" required="">
	<option value=""></option>
	<option value="Male">Male</option>
	<option value="Female">Female</option>
</select>
<small class="text-danger invalid-feedback">Input Blank Fields</small>
</div>
</div>

<div class="col-md-4 mb-3">
<label class="fw-bolder">Birthdate</label>
<div class="input-group">
	<span class="input-group-text bg-info bg-gradient"><i class="fa fa-calendar text-white"></i></span>
	<input type="text" name="entry_bday" class="form-control dtPicker" required="">
</div>
<small class="text-danger invalid-feedback">Input Blank Fields</small>
</div>

<div class="col-md-4 mb-3">
<label class="fw-bolder">Upload File</label>
<div class="input-group">
	<span class="input-group-text bg-info bg-gradient"><i class="fa fa-file text-light"></i></span>
	<input type="file" class="form-control" name="entry_file" accept="image/*">
</div>
</div>

<div class="col-md-12">
<input type="submit" class="btn btn-outline-primary btn-sm" name="btnEntry" value="Insert">
</div>

</form>
</div>

</div>
</div>

</div>

<div class="modal fade" id="modalUpdate" aria-hidden="true" tabindex="-1">

<div class="modal-dialog modal-lg">
	
<div class="modal-content">
	
	<div class="modal-header">
			<h3 class="text-uppercase text-success fw-bolder modal-title animate__animated animate__fadeIn animate__infinite infinite animate__slow">Update</h3>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	</div>

	<div class="modal-body">
		<form class="row needs-validation" novalidate="" enctype="multipart/form-data" method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			
		<input type="hidden" name="update_id" id="update_id">

		<div class="col-md-4 mb-3">
			<label class="fw-bolder">First Name</label>
			<div class="input-group">
				<span class="input-group-text bg-info bg-gradient"><i class="text-light fa fa-user"></i></span>
				<input type="text" id="update_fname" name="update_fname" class="form-control" required="">
				<small class="text-danger invalid-feedback">Input blank Fields</small>
			</div>
		</div>

		<div class="col-md-4 mb-3">
			<label class="fw-bolder">Middle Name</label>
			<div class="input-group">
				<span class="input-group-text bg-info bg-gradient"><i class="text-light fa fa-user"></i></span>
				<input type="text" id="update_mname" name="update_mname" class="form-control" required="">
				<small class="text-danger invalid-feedback">Input blank Fields</small>
			</div>
		</div>

		<div class="col-md-4 mb-3">
			<label class="fw-bolder">Last Name</label>
			<div class="input-group">
				<span class="input-group-text bg-info bg-gradient"><i class="text-light fa fa-user"></i></span>
				<input type="text" id="update_lname" name="update_lname" class="form-control" required="">
				<small class="text-danger invalid-feedback">Input blank Fields</small>
			</div>
		</div>

		<div class="col-md-4 mb-3">
			<label class="fw-bolder">Gender</label>
			<div class="input-group">
				<span class="input-group-text bg-info bg-gradient"><i class="fa fa-transgender text-light"></i></span>
				<select class="form-control" name="update_gender" id="update_gender" required="">
				<option value=""></option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>
			<small class="text-danger invalid-feedback">Input Blank Fields</small>
			</div>
		</div>

		<div class="col-md-4 mb-3">
			<label class="fw-bolder">Birthdate</label>
			<div class="input-group">
				<span class="input-group-text bg-info bg-gradient"><i class="fa fa-calendar text-white"></i></span>
				<input type="text" name="update_bday" id="update_bday" class="form-control dtPicker" required="">
			</div>
			<small class="text-danger invalid-feedback">Input Blank Fields</small>
		</div>

		<div class="col-md-4 mb-3">
			<label class="fw-bolder">Upload File</label>
			<div class="input-group">
				<span class="input-group-text bg-info bg-gradient"><i class="fa fa-file text-light"></i></span>
				<input type="file" class="form-control" name="update_file" accept="image/*">
			</div>
		</div>

		<div class="col-md-12">
			<input type="submit" class="btn btn-outline-primary btn-sm" name="btnUpdate" value="Update">
		</div>

		</form>	
	</div>

</div>

</div>

</div>



<div class="modal fade" id="modalDelete" aria-hidden="true" tabindex="-1">

<div class="modal-dialog modal-lg">
	
<div class="modal-content">
	
<div class="modal-header">
	<h3 class="text-danger text-primary fw-bolder modal-title animate__animated animate__fadeIn animate__infinite infinite animate__slow">Delete</h3>
	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body">

<div class="row">
	<div class="col-md-12">
		<h4 class="text-warning">Do you want to delete these records of <span id="fname"></span> <span id="lname"></span>?</h4>
	</div>
</div>

<div class="row">
		<div class="col-md-4">
		<div class="table-responsive">
			<table class="table table-hover table-bordered border border-1 border-dark">
				
				<tr class="fw-bolder">
					<td>First Name</td>
					<td id="first_name"></td>
				</tr>

				<tr class="fw-bolder">
					<td>Last Name</td>
					<td id="last_name"></td>
				</tr>

				<tr class="fw-bolder">
					<td>Gender</td>
					<td id="gender"></td>
				</tr>

			</table>
		</div>
	</div>
</div>

	<div class="row">
		<div class="col-md-12 text-end">
		<form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<input type="hidden" class="form-control" name="del_id" id="del_id">
		<input type="submit" name="btnDelete" class="btn btn-sm btn-outline-danger">
	</form>
	</div>
	</div>

</div>

</div>

</div>
	
</div>