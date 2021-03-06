<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-8 md-tacenter sm-tacenter xs-tacenter">
		Espaço para filtros
		<div class="xs-spacer15"></div>
	</div>
	<div class="col-xs-12 col-sm-4 col-md-1 md-tacenter sm-tacenter xs-tacenter">
		<button type="submit" class="btn btn-primary" name="filterCategory">Filter</button>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-3 md-taright sm-tacenter xs-tacenter">
		<div class="sm-spacer15 xs-spacer15"></div>
		<button data-toggle="modal" data-target="#form-add-account" data-backdrop="static" data-keyboard="false" class="btn btn-add" role="button">
			<i class="fa fa-plus" aria-hidden="true"></i><div class="sm-block15 xs-block15"></div>{c2r-label-add-account}
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
					<th>{c2r-acc-label-name}</th>
					<th>{c2r-acc-label-institutionName}</th>
					<th>{c2r-acc-label-balance}</th>
					<th>{c2r-acc-label-last-mov-date}</th>
					<th>{c2r-acc-label-status}</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				{c2r-acc-list}
			</tbody>
		</table>
	</div>
</div>

<div class="md-spacer15 sm-spacer15 xs-spacer15"></div>

{c2r-form-add-account}

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
