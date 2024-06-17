$(document).on("click", ".edit-retrieve", function(e){
	e.preventDefault();
	let id = $(this).attr("id");
	
	$.ajax({
		url: "retrieve.php",
		method: "POST",
		data:{
			update_id: id
		},
		dataType: "json",
		success: function(data){
			$("#update_id").val(data.id);
			$("#update_fname").val(data.first_name);
			$("#update_mname").val(data.middle_name);
			$("#update_lname").val(data.last_name);
			$("#update_gender").val(data.gender);
			$("#update_bday").val(data.birthdate);
		}
	});
});


$(document).on("click", ".del-retrieve", function(e){
	e.preventDefault();
	let del_id = $(this).attr("id");

	$.ajax({
		url: "retrieve.php",
		method: "POST",
		data:{
			del_id: del_id
		},
		dataType: "json",
		success: function(data){
			$("#del_id").val(data.id);
			$("#fname").html(data.first_name);
			$("#lname").html(data.last_name);
			$("#first_name").html(data.first_name);
			$("#last_name").html(data.last_name);
			$("#gender").html(data.gender);
		}
	});
});