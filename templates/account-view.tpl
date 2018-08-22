<div class="row jumbotron md-tacenter sm-tacenter xs-tacenter">
	<div class="col-xs-12 col-sm-4 col-md-3">
		<h4>{c2r-acc-name-label}&nbsp;</h4>{c2r-acc-name-value}
	</div>
	<div class="col-xs-12 col-sm-4 col-md-3">
		<h4>{c2r-acc-balance-label}&nbsp;</h4>{c2r-acc-balance-value}
	</div>
	<div class="col-xs-12 col-sm-4 col-md-3">
		<h4>{c2r-acc-institutionName-label}&nbsp;</h4>{c2r-acc-institutionName-value}
	</div>
	<div class="col-xs-12 col-sm-4 col-md-3">
		<h4>{c2r-acc-iban-label}&nbsp;</h4>{c2r-acc-iban-value}
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-8 md-tacenter sm-tacenter xs-tacenter">
		<div class="md-spacer15 sm-spacer15 xs-spacer15"></div>
		Espaço para filtros
		<div class="xs-spacer15"></div>
	</div>
	<div class="col-xs-12 col-sm-4 col-md-1 md-tacenter sm-tacenter xs-tacenter">
		<div class="md-spacer15 sm-spacer15 xs-spacer15"></div>
		<button type="submit" class="btn btn-primary" name="filterCategory">Filter</button>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-3 md-taright sm-tacenter xs-tacenter">
		<div class="sm-spacer15 xs-spacer15"></div>
		<button data-toggle="modal" data-target="#form-add-movement" data-backdrop="static" data-keyboard="false" class="btn btn-add" role="button">
			<i class="fa fa-plus" aria-hidden="true"></i><div class="sm-block15 xs-block15"></div>{c2r-label-add-movement}
		</button>

	</div>
</div>
<div class="md-spacer15 sm-spacer15 xs-spacer15"></div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table id="acc-table" class="table table-striped accounts table-responsive">
			<thead>
				<tr>
					<th width="2%">#</th>
					<th width="30%">{c2r-mov-label-name}</th>
					<th>{c2r-mov-label-value}</th>
					<th>{c2r-mov-label-user}</th>
					<th>{c2r-mov-label-date}</th>
					<th>{c2r-mov-label-status}</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				{c2r-acc-movs-list}
			</tbody>
		</table>
	</div>
</div>

<div class="md-spacer15 sm-spacer15 xs-spacer15"></div>

{c2r-form-add-acc-movement}
{c2r-form-edit-acc-movement}

<script>
	let dtli = "{c2r-dt-legends-info}",
		dtln = "{c2r-dt-legends-next}",
		dtlp = "{c2r-dt-legends-previous}"
</script>

<!-- CSS -->
<link rel="stylesheet" href="{c2r-module-path}/site-assets/css/style.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css"/>
<link rel="stylesheet" href="{c2r-module-path}/site-assets/css/flatpickr.min.css">
<!-- JS -->
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script src="{c2r-module-path}/site-assets/js/swal.min.js" charset="utf-8"></script>
<script src="{c2r-module-path}/site-assets/js/flatpickr.js" charset="utf-8"></script>
<script src="{c2r-module-path}/site-assets/js/accounts.js" charset="utf-8"></script>
