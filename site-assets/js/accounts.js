$(document).ready(function() {

	if ($('.flatpickr-movs').length > 0) {
		$(".flatpickr-movs").flatpickr({
			enableTime: true,
			time_24hr: true
		});
	}

	$('#acc-table').DataTable(
		{
			responsive: true,
			ordering: false,
			searching: false,
			lengthChange: false,
			language: {
				"info": dtli,
				"paginate": {
					"next": dtln,
					"previous" : dtlp
				}
			},
		}
	);

	//ADD ACCOUNT FORM
	$("body").on(
		"click",
		"#form-add-account-btn",
		function () {

			$.ajax({
				type: "POST",
				url: $("#form-add-account form").attr("action"),
				data: $("#form-add-account form").serializeObject(),
				dataType: "json",
				success: (function (data) {

					if (data.status === true) {
						$("#form-add-account form")[0].reset();
						$('#form-add-account').modal('hide');
						swal({
							title: data.message.title,
							text: data.message.text,
							icon: "success",
							button: false
						});
						setTimeout(function(){ location.reload(); }, 2000);

					} else {
						$('#show-add-account-error').html(data.message);
						$('#show-add-account-error').removeClass("hidden");
						setTimeout(function(){ $('#show-add-account-error').addClass("hidden"); }, 3000);
					}


				}),
			});

			return false;
		}
	);

	//ADD ACCOUNT MOVEMENT
	$("body").on(
		"click",
		"#form-add-mov-btn",
		function () {

			$.ajax({
				type: "POST",
				url: $("#form-add-movement form").attr("action"),
				data: $("#form-add-movement form").serializeObject(),
				dataType: "json",
				success: (function (data) {

					if (data.status === true) {
						$("#form-add-movement form")[0].reset();
						$('#form-add-movement').modal('hide');
						swal({
							title: data.message.title,
							text: data.message.text,
							icon: "success",
							button: false
						});
						setTimeout(function(){ location.reload(); }, 2000);

					} else {
						$('#show-add-movement-error').html(data.message);
						$('#show-add-movement-error').removeClass("hidden");
						setTimeout(function(){ $('#show-add-movement-error').addClass("hidden"); }, 3000);
					}


				}),
			});

			return false;
		}
	);

	//ADD ACCOUNT MOVEMENT
	$("body").on(
		"click",
		"#view-movement",
		function () {

			// $('#form-view-movement').modal('show');

			$.ajax({
				type: "POST",
				url: $(this)[0].href,
				data: {
					"id" : $(this).data("id")
				},
				dataType: "json",
				success: (function (data) {
					console.log(data);
					$("#form-view-movement form")[0].reset();
					if (data.status === true) {
						$("#form-view-movement form input#inputAccMovName").val(data.message.name);
						$("#form-view-movement form input#inputAccMovDesc").val(data.message.description);
						$("#form-view-movement form input#inputAccMovValue").val(Number(data.message.value).toFixed(2));

						$('#form-view-movement').modal('show');
					} else {

					}


				}),
			});

			return false;
		}
	);

} );
