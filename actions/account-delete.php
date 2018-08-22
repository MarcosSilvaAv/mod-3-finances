<?php

	if(isset($id) && !empty($id)){

		if (!isset($breadcrumb))
			$breadcrumb = [];

		array_push($breadcrumb,
			["name" => "Accounts","link" => "{c2r-path-bo}/{c2r-lg}/{c2r-module-folder}/accounts/"],
			["name" => "Delete","link" => ""]
		);

		if (!isset($content))
			$content = "";

		$acc_obj = new c3_finances();

		if(isset($_POST["deleteAcc"])) {

			$acc_obj->setAccId($id);
			$feedback_tpl = bo3::mdl_load("templates-e/account-delete/feedback.tpl");

			if($acc_obj->deleteAcc()){
				// acc deleted
				$content = bo3::c2r(["feedback" => $mdl_lang["account-delete"]["success"]], $feedback_tpl);
				header("Location: {$cfg->system->path_bo}/{$lg_s}/3-finances/accounts/");

			} else {
				// failded delete
				$content = bo3::c2r(["feedback" => $mdl_lang["account-delete"]["error"]], $feedback_tpl);
			}

		} else {
			$acc_obj->setId($id);
			$acc = $acc_obj->returnOneAcc();

			$content = bo3::c2r(
				[
					"id" => $id,
					"acc-del-question" => $mdl_lang["account-delete"]["question"],
					"acc-name" => $acc->name
				],
				bo3::mdl_load("templates-e/account-delete/form.tpl")
			);

		}

		$mdl = bo3::c2r(
			[
				"id" => $id,
				"acc-content" => isset($content) ? $content : ""
			],
			bo3::mdl_load("templates/account-delete.tpl")
		);

		include "pages/module-core.php";

	} else {
		header("Location: {$cfg->system->path_bo}/{$lg_s}/404/");
	}
