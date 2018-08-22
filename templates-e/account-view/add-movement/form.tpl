<!-- Modal -->
<div class="modal fade taleft" id="form-add-movement" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form role="form" action="{c2r-path-bo}/{c2r-lg}/{c2r-module-folder}/api/?r=add-account-mov">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">
					{c2r-acc-add-mov-title}
					</h4>
				</div>

				<!-- Modal Body -->
				<div class="modal-body">

					<input type="hidden" class="form-control" id="inputAccId" name="inputAccId" value="{c2r-acc-id}" />

					<!-- MOV NAME  -->
					<div class="form-group">
						<label for="inputAccMovName">{c2r-acc-mov-name-title}</label>
						<input type="text" class="form-control" id="inputAccMovName" name="inputAccMovName" placeholder="{c2r-acc-mov-name-ph}" />
					</div>
					<!-- END MOV NAME  -->

					<!-- MOV DESC  -->
					<div class="form-group">
						<label for="inputAccMovDesc">{c2r-acc-mov-desc-title}</label>
						<input type="text" class="form-control" id="inputAccMovDesc" name="inputAccMovDesc" placeholder="{c2r-acc-mov-desc-ph}" />
					</div>
					<!-- END MOV DESC  -->

					<div class="row">
						<div class="col-md-5">
							<!-- MOV VALUE  -->
							<div class="form-group">
								<label for="inputAccMovValue">{c2r-acc-mov-value-title}</label>
								<input type="number" class="form-control" id="inputAccMovValue" name="inputAccMovValue" placeholder="{c2r-acc-mov-value-ph}" />
							</div>
							<!-- END MOV VALUE  -->
						</div>
						<div class="col-md-7">
							<!-- MOV DATE  -->
							<div class="form-group">
								<label for="inputAccMovDate">{c2r-acc-mov-date-title}</label>
								<input type="text" class="flatpickr-movs form-control" placeholder="{c2r-acc-mov-date-title-ph}" id="inputAccMovDate" name="inputAccMovDate">
							</div>
						</div>
							<!-- END MOV DATE  -->
					</div>

					<div class="checkbox">
						<label><input type="checkbox" name="inputAccMovStatus" value="1"/> {c2r-acc-mov-status-title}</label>
					</div>

					<!-- FILES AREA  -->
					<div class="form-group">
						<p>Future space for files</p>
						<div class="spacer15"></div>
					</div>
					<div id="files-area" class="container-fluid">

					</div>
					<!-- END FILES AREA  -->

					<div id="show-add-movement-error" class="alert alert-danger hidden" role="alert">

					</div>

				</div>
				<!-- Modal Footer -->
				<div class="modal-footer taright">
					<button id="form-add-mov-btn" type="submit" class="btn btn-save" name="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i><div class="sm-block15"></div> {c2r-acc-mov-lg-save}</button>
					<button id="button-close" class="btn btn-cancel" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i><div class="sm-block15"></div> {c2r-acc-mov-lg-cancel}</button>
				</div>
			</form>
		</div>
	</div>
</div>
