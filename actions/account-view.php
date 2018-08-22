<?php

	if (!isset($breadcrumb)) {
		$breadcrumb = [];
	}


	if(isset($id) && $id != '') {

		$acc_obj = new c3_finances();
		$acc_obj->setId($id);
		$movs_list = $acc_obj->returnAllAccMovs(null, 'date desc, id desc');
		$acc_data = $acc_obj->returnOneAcc();

		array_push($breadcrumb,
			["name" => "Accounts","link" => "{c2r-path-bo}/{c2r-lg}/{c2r-module-folder}/accounts/"],
			["name" => "{$acc_data->name}","link" => ""]
		);


		foreach ($movs_list as $mov) {
			if (!isset($list)) {
				$list = "";
				$item = bo3::mdl_load("templates-e/account-view/item.tpl");
			}

			$usr_obj = new user();
			$usr_obj->setId($mov->user_id);
			$usr = $usr_obj->returnOneUser();

			$list .= bo3::c2r(
				[
					"id" => $mov->id,
					"mov-name" => $mov->name,
					"mov-desc" => $mov->description,
					"mov-value" => sprintf("%s €",number_format($mov->value, 2, ".", "")),
					"mov-value-color" => $mov->value > 0 ? "text-green" : "text-red",
					"mov-user" => $usr->username,
					"mov-date" => date("Y-m-d", strtotime($mov->date)),
					"mov-status" => ($mov->status) ? "fa-toggle-on" : "fa-toggle-off",
				],
				$item
			);

		}

		$mdl = bo3::c2r(
			[
				"acc-name-label" => $mdl_lang["account-movs"]["acc-name-label"],
				"acc-name-value" => $acc_data->name,
				"acc-balance-label" => $mdl_lang["account-movs"]["acc-balance-label"],
				"acc-balance-value" => sprintf("%s €",number_format($acc_data->balance, 2, ".", "")),
				"acc-institutionName-label" => $mdl_lang["account-movs"]["acc-institutionName-label"],
				"acc-institutionName-value" => $acc_data->institution_name,
				"acc-iban-label" => $mdl_lang["account-movs"]["acc-iban-label"],
				"acc-iban-value" => $acc_data->iban,
				"acc-movs-list" => isset($list) ? $list : "",
				"label-add-movement" => $mdl_lang["account-movs"]["acc-label-mov-add"],
				"mov-label-name" => $mdl_lang["account-movs"]["mov-label-name"],
				"mov-label-value" => $mdl_lang["account-movs"]["mov-label-value"],
				"mov-label-user" => $mdl_lang["account-movs"]["mov-label-user"],
				"mov-label-date" => $mdl_lang["account-movs"]["mov-label-date"],
				"mov-label-status" => $mdl_lang["account-movs"]["mov-label-status"],
				/*VIEW MOVEMENT FORM*/
				'form-edit-acc-movement' => bo3::mdl_load("templates-e/account-view/view-movement/form.tpl"),
				'acc-edit-mov-title' => $mdl_lang["account-movs"]["acc-edit-mov-title"],
				/*ADD MOVEMENT FORM*/
				'form-add-acc-movement' => bo3::mdl_load("templates-e/account-view/add-movement/form.tpl"),
				'acc-id' => isset($id) ? $id : "",
				'acc-add-mov-title' => $mdl_lang["account-movs"]["acc-label-mov-add"],
				'acc-mov-name-title' => $mdl_lang["account-movs"]["acc-mov-name-title"],
				'acc-mov-name-ph' => $mdl_lang["account-movs"]["acc-mov-name-ph"],
				'acc-mov-desc-title' => $mdl_lang["account-movs"]["acc-mov-desc-title"],
				'acc-mov-desc-ph' => $mdl_lang["account-movs"]["acc-mov-desc-ph"],
				'acc-mov-value-title' => $mdl_lang["account-movs"]["acc-mov-value-title"],
				'acc-mov-value-ph' => $mdl_lang["account-movs"]["acc-mov-value-ph"],
				'acc-mov-date-title' => $mdl_lang["account-movs"]["acc-mov-date-title"],
				'acc-mov-date-title-ph' => $mdl_lang["account-movs"]["acc-mov-date-title-ph"],
				'acc-mov-status-title' => $mdl_lang["account-movs"]["acc-mov-status-title"],
				'acc-mov-lg-save' => $mdl_lang["account-movs"]["acc-mov-lg-save"],
				'acc-mov-lg-cancel' => $mdl_lang["account-movs"]["acc-mov-lg-cancel"],
				/*END ADD MOVEMENT FORM*/
				"dt-legends-info" => $mdl_lang["DT_Legends"]["info"],
				"dt-legends-next" => $mdl_lang["DT_Legends"]["paginate-next"],
				"dt-legends-previous" => $mdl_lang["DT_Legends"]["paginate-previous"],
			],
			bo3::mdl_load("templates/account-view.tpl")
		);

	} else {

		array_push($breadcrumb,
			["name" => "Accounts","link" => "{c2r-path-bo}/{c2r-lg}/{c2r-module-folder}/accounts/"]
		);

		$mdl = bo3::c2r(
			[
				"path-back" => "{c2r-path-bo}/{c2r-lg}/{c2r-module-folder}/accounts/"
			],
			bo3::mdl_load("templates-e/account-view/error.tpl")
		);
	}



	include "pages/module-core.php";
