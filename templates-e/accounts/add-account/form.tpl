<!-- Modal -->
<div class="modal fade taleft" id="form-add-account" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form role="form" action="{c2r-path-bo}/{c2r-lg}/{c2r-module-folder}/api/?r=add-account">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">
					{c2r-acc-add-title}
					</h4>
				</div>

				<!-- Modal Body -->
				<div class="modal-body">

					<!-- ACCOUNT NAME  -->
					<div class="form-group">
						<label for="inputAccName">{c2r-acc-name-title}*</label>
						<input type="text" class="form-control" id="inputAccName" name="inputAccName" placeholder="{c2r-acc-name-ph}" />
					</div>
					<!-- END ACCOUNT NAME  -->

					<!-- ACCOUNT DESC  -->
					<div class="form-group">
						<label for="inputAccDesc">{c2r-acc-desc-title}</label>
						<input type="text" class="form-control" id="inputAccDesc" name="inputAccDesc" placeholder="{c2r-acc-desc-ph}" />
					</div>
					<!-- END ACCOUNT DESC  -->

					<!-- ACCOUNT INST NAME & NUMBER -->
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label for="inputAccInstName">{c2r-acc-instName-title}</label>
								<input type="text" class="form-control" id="inputAccInstName" name="inputAccInstName" placeholder="{c2r-acc-instName-ph}" />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="inputAccNumber">{c2r-acc-number-title}</label>
								<input type="text" class="form-control" id="inputAccNumber" name="inputAccNumber" placeholder="{c2r-acc-number-ph}" />
							</div>
						</div>
					</div>
					<!-- END ACCOUNT INST NAME & NUMBER  -->

					<!-- ACCOUNT IBAN & SWIFT -->
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label for="inputAccIban">{c2r-acc-iban-title}*</label>
								<input type="text" class="form-control" id="inputAccIban" name="inputAccIban" placeholder="{c2r-acc-iban-ph}" />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="inputAccSwift">{c2r-acc-swift-title}</label>
								<input type="text" class="form-control" id="inputAccSwift" name="inputAccSwift" placeholder="{c2r-acc-swift-ph}" />
							</div>
						</div>
					</div>
					<!-- END ACCOUNT IBAN & SWIFT  -->


					<!-- ACCOUNT SORT -->
					<div class="form-group">
						<label for="inputAccSort">{c2r-acc-sort-title}</label>
						<input type="text" class="form-control" id="inputAccSort" name="inputAccSort" placeholder="{c2r-acc-sort-ph}" />
					</div>
					<!-- END ACCOUNT SORT  -->

					<!-- ACCOUNT CODE -->
					<div class="form-group">
						<label for="inputAccCode">{c2r-acc-code-title}</label>
						<textarea name="inputAccCode" id="inputAccCode" class="form-control" rows="3"  placeholder="{c2r-acc-code-ph}" style="resize: vertical;"></textarea>
					</div>
					<!-- END ACCOUNT CODE  -->

					<!-- ACCOUNT ACTIVE -->
					<div class="checkbox">
						<label><input type="checkbox" id="inputAccStatus" name="inputAccStatus" value="1" /> {c2r-acc-status-title}</label>
					</div>
					<!-- END ACCOUNT ACTIVE  -->

					<!-- FILES AREA  -->
					<div class="form-group">
						<p>Future space for files</p>
						<div class="spacer15"></div>
					</div>
					<div id="files-area" class="container-fluid">
					<!-- END FILES AREA  -->

					</div>

					<div id="show-add-account-error" class="alert alert-danger hidden" role="alert">

					</div>
				</div>
				<!-- Modal Footer -->
				<div class="modal-footer taright">
					<button id="form-add-account-btn" type="submit" class="btn btn-save" name="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i><div class="sm-block15"></div> {c2r-acc-lg-save}</button>
					<button id="button-close" class="btn btn-cancel" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i><div class="sm-block15"></div> {c2r-acc-lg-cancel}</button>
				</div>
			</form>
		</div>
	</div>
</div>
