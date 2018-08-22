<?php

	$breadcrumb = [];

	$breadcrumb[] = [
		"name" => "Accounts",
		"link" => ""
	];

	$acc_obj = new c3_finances();
	$acc_list = $acc_obj->returnAllAccs(null, 'sort asc, date asc');

	foreach ($acc_list as $acc) {
		if (!isset($list)) {
			$list = "";
			$item = bo3::mdl_load("templates-e/accounts/item.tpl");
		}

		$list .= bo3::c2r(
			[
				"id" => $acc->id,
				"acc-name" => $acc->name,
				"acc-desc" => $acc->description,
				"institution-name" => $acc->institution_name,
				"balance" => $acc->balance,
				"date" => date("Y-m-d", strtotime($acc->date)),
				"status" => ($acc->status) ? "fa-toggle-on" : "fa-toggle-off",
			],
			$item
		);

	}

	$mdl = bo3::c2r(
		[
			"label-add-account" => $mdl_lang["accounts"]["acc-label-add"],
			"acc-label-name" => $mdl_lang["accounts"]["acc-label-name"],
			"acc-label-institutionName" => $mdl_lang["accounts"]["acc-label-institutionName"],
			"acc-label-balance" => $mdl_lang["accounts"]["acc-label-balance"],
			"acc-label-last-mov-date" => $mdl_lang["accounts"]["acc-label-last-mov-date"],
			"acc-label-status" => $mdl_lang["accounts"]["acc-label-status"],
			"dt-legends-info" => $mdl_lang["DT_Legends"]["info"],
			"dt-legends-next" => $mdl_lang["DT_Legends"]["paginate-next"],
			"dt-legends-previous" => $mdl_lang["DT_Legends"]["paginate-previous"],
			"acc-list" => isset($list) ? $list : "",
			/*ADD ACCOUNT FORM*/
			'form-add-account' => bo3::mdl_load("templates-e/accounts/add-account/form.tpl"),
			'accounts-title' => $mdl_lang["accounts"]["acc-label-add"],
			'acc-add-title' => $mdl_lang["accounts"]["acc-label-add"],
			'acc-name-title' => $mdl_lang["accounts"]["acc-name-title"],
			'acc-name-ph' => $mdl_lang["accounts"]["acc-name-ph"],
			'acc-desc-title' => $mdl_lang["accounts"]["acc-desc-title"],
			'acc-desc-ph' => $mdl_lang["accounts"]["acc-desc-ph"],
			'acc-instName-title' => $mdl_lang["accounts"]["acc-instName-title"],
			'acc-instName-ph' => $mdl_lang["accounts"]["acc-instName-ph"],
			'acc-number-title' => $mdl_lang["accounts"]["acc-number-title"],
			'acc-number-ph' => $mdl_lang["accounts"]["acc-number-ph"],
			'acc-iban-title' => $mdl_lang["accounts"]["acc-iban-title"],
			'acc-iban-ph' => $mdl_lang["accounts"]["acc-iban-ph"],
			'acc-swift-title' => $mdl_lang["accounts"]["acc-swift-title"],
			'acc-swift-ph' => $mdl_lang["accounts"]["acc-swift-ph"],
			'acc-sort-title' => $mdl_lang["accounts"]["acc-sort-title"],
			'acc-sort-ph' => $mdl_lang["accounts"]["acc-sort-ph"],
			'acc-code-title' => $mdl_lang["accounts"]["acc-code-title"],
			'acc-code-ph' => $mdl_lang["accounts"]["acc-code-ph"],
			'acc-status-title' => $mdl_lang["accounts"]["acc-status-title"],
			'acc-lg-save' => $mdl_lang["accounts"]["acc-lg-save"],
			'acc-lg-cancel' => $mdl_lang["accounts"]["acc-lg-cancel"]
			/*END ADD ACCOUNT FORM*/
		],
		bo3::mdl_load("templates/accounts.tpl")
	);

	include "pages/module-core.php";
