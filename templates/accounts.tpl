{c2r-mod-menu}

<div class="row">
	<div class="col-xs-12 col-sm-3 col-md-3">
		<h5>{c2r-accounts-title}</h5>
		<button id="add-account-btn" class="btn btn-add btn-lg btn-block" data-toggle="modal" data-target="#form-add-account" data-backdrop="static" data-keyboard="false">
			<i class="fa fa-plus" aria-hidden="true"></i><div class="xs-block15 sm-block15"></div>
			{c2r-accounts-add-btn}
		</button>
		<div class="xs-spacer15 sm-spacer30"></div>
		<div class="list-group" id="list-table">
			{c2r-accounts-list}
		</div>
	</div>

	<div class="col-xs-12 col-sm-3 col-md-4">
		<h5>{c2r-movements-title}</h5>
		<button id="add-movement-btn" class="btn btn-add btn-lg btn-block" data-toggle="modal" data-target="#form-add-movement" data-backdrop="static" data-keyboard="false" data-id="">
			<i class="fa fa-plus" aria-hidden="true"></i><div class="xs-block15 sm-block15"></div>
			{c2r-accounts-add-movs-btn}
		</button>
		<div class="xs-spacer15 sm-spacer30"></div>
		<div class="list-group" id="movements-list">
			<!-- movements tasks -->
		</div>
	</div>

	<div class="col-xs-12 col-sm-5 col-md-5 details-view">
		<h5>Details</h5>
		<div id="account-view"></div>
		<!-- Accoutns details view -->
		<div class="xs-spacer15 sm-spacer30"></div>
		<div id="movs-description">
			<!-- Movs Details Here -->
		</div>
		<div class="xs-spacer15 sm-spacer30"></div>
	</div>
</div>

<div id="modals-area">
	{c2r-form-add-account}
	{c2r-form-add-movement}
</div>

<script>

	let api_url = '{c2r-path-bo}/{c2r-lg}/{c2r-module-folder}/api/',
		acc_mov_item = '{c2r-acc-mov-item-tpl}',
		acc_details = '{c2r-acc-details-item-tpl}';

</script>

<link rel="stylesheet" href="{c2r-module-path}/site-assets/css/style.css">

<link rel="stylesheet" href="{c2r-module-path}/site-assets/css/flatpickr.min.css">
<script src="{c2r-module-path}/site-assets/js/flatpickr.js" charset="utf-8"></script>

<script src="{c2r-module-path}/site-assets/js/accounts.js" charset="utf-8"></script>
