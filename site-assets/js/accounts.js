(
	function ($) {
		$.fn.serializeObject = function () { var o = {};
		var a = this.serializeArray();
		$.each(
			a,
			function () {
				if (o[this.name]) {
					if (!o[this.name].push) {
						o[this.name] = [o[this.name]];
					}

					o[this.name].push(this.value || '');
				} else {
					o[this.name] = this.value || '';
				}
			});
			return o;
		};
	}
)(jQuery);

function account_movs_init(id) {
	$('#movements-list').empty();
	$('#account-view').empty();
	$('#movs-description').empty();

	$.ajax({
		type: "get",
		url: api_url + id + "?r=get-account-movs",
		dataType: "json",
		success: (function (data) {
			if(data.status && data.message !== ''){
				// account_id:"10"
				// date:"2017-11-27 00:00:00"
				// date_update:"2017-11-27 00:00:00"
				// description:"teste desc"
				// id:"10"
				// name:"Pagamento"
				// status:"1"
				// user_id:"1"
				// value:"35"

				for (i = 0; i < data.message.length; i++) {
					$(acc_mov_item).appendTo('#movements-list');
				}

				$('#movements-list a').each(
				function(i, obj) {

					let value = 0;
					value = Number(data.message[i].value).toFixed(2);

					if(value > 0) {
						$(obj).find('div#mov-value').addClass('text-green');
					} else {
						$(obj).find('div#mov-value').addClass('text-red');
					}

					$(obj).attr("data-acc-id", data.message[i].account_id);
					$(obj).attr("data-mov-id", data.message[i].id);
					$(obj).find('div#mov-id').html(data.message[i].id);
					$(obj).find('div#mov-name').html(data.message[i].name);
					$(obj).find('div#mov-value').html(value + " €");

				}
			);

			}

		}
	)
	});

}

function account_details_init(id) {
	$.ajax({
		type: "get",
		url: api_url + id + "?r=get-account-details",
		dataType: "json",
		success: (function (data) {
			if(data.status && data.message !== ''){

				// account_number:"123"
				// balance:"0"
				// code:""
				// date:"2017-11-13 21:14:52"
				// date_update:"2017-11-13 21:14:52"
				// description:"Conta do Marcos Silva"
				// iban:"123"
				// id:"10"
				// institution_name:"CGD"
				// name:"Conta MS"
				// sort:"1"
				// status:"1"
				// swift:"123"
				// user_id:"1"

				$(acc_details).appendTo('#account-view');

				$('#account-view .acc-name').html(data.message.name);
				$('#account-view .acc-intitution-name').html(data.message.institution_name);
				$('#account-view .acc-desc').html(data.message.description);
				$('#account-view .acc-number').html(data.message.account_number);
				$('#account-view .acc-iban').html(data.message.iban);
				$('#account-view .acc-swift').html(data.message.swift);
				$('#account-view .acc-code').html(data.message.code);

				$('#account-view .acc-balance').html(Number(data.message.balance).toFixed(2));

			}
		})
	});
}

$(document).ready(
	function () {

		if ($('.flatpickr-movs').length > 0) {
			$(".flatpickr-movs").flatpickr({
				enableTime: true,
				time_24hr: true
			});
		}

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

		//VIEW ACCOUNT MOVS
		$("body").on(
			"click",
			"a.account-item",
			function () {
				var id = $(this).data("id");

				$('#add-movement-btn').data("id", id);
				$("a.account-item").each(
					function() {
						$( this ).removeClass( "active" );
					}
				);
				$(this).addClass("active");

				account_movs_init(id);
				account_details_init(id);

			}
		);

		//VIEW ACCOUNT MOVS DETAILS
		$("body").on(
			"click",
			"a.mov-item",
			function () {
				var id = $(this).data("id");

				$("a.mov-item").each(
					function() {
						$( this ).removeClass( "active" );
					}
				);

				$(this).addClass("active");

			}
		);


	}
);
