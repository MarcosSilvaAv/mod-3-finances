<?php

	$accounts_list = null;
	$accounts = new finances();
	$accounts = $accounts->returnAllAccs("status = true", "sort ASC");

	$acc_item_tpl = bo3::mdl_load("templates-e/accounts/list-account/item.tpl");

	if(count($accounts) > 0 ){
		foreach ($accounts as $item) {
			$account_list .= bo3::c2r(
				[
					"account-id" => $item->id,
					"account-name" => $item->name
				],
				$acc_item_tpl
			);
		}
	}

	$mdl = bo3::c2r(
		[
			'mod-menu' => bo3::mdl_load("templates-e/accounts/menu.tpl"),
			'accounts-list' => $account_list,
			/*TPL ITEMS*/
			'acc-mov-item-tpl' => bo3::mdl_load("templates-e/accounts/list-movements/item.tpl"),
			'acc-details-item-tpl' => bo3::mdl_load("templates-e/accounts/detail-account/details.tpl"),
			/*ADD ACCOUNT FORM*/
			'form-add-account' => bo3::mdl_load("templates-e/accounts/add-account/form.tpl"),
			'accounts-title' => $mdl_lang["accounts"]["acc-title"],
			'movements-title' => $mdl_lang["accounts"]["acc-movs-title"],
			'accounts-add-btn' => $mdl_lang["accounts"]["acc-add"],
			'accounts-add-movs-btn' => $mdl_lang["accounts"]["acc-movs-add"],
			'acc-add-title' => $mdl_lang["accounts"]["acc-add"],
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
			'acc-lg-cancel' => $mdl_lang["accounts"]["acc-lg-cancel"],
			/*ADD ACCOUNT MOVEMENT FORM*/
			'form-add-movement' => bo3::mdl_load("templates-e/accounts/add-movement/form.tpl"),
			'acc-add-mov-title' => $mdl_lang["accounts"]["acc-add-mov-title"],
			'acc-mov-name-title' => $mdl_lang["accounts"]["acc-mov-name-title"],
			'acc-mov-name-ph' => $mdl_lang["accounts"]["acc-mov-name-ph"],
			'acc-mov-desc-title' => $mdl_lang["accounts"]["acc-mov-desc-title"],
			'acc-mov-desc-ph' => $mdl_lang["accounts"]["acc-mov-desc-ph"],
			'acc-mov-value-title' => $mdl_lang["accounts"]["acc-mov-value-title"],
			'acc-mov-value-ph' => $mdl_lang["accounts"]["acc-mov-value-ph"],
			'acc-mov-date-title' => $mdl_lang["accounts"]["acc-mov-date-title"],
			'acc-mov-date-title-ph' => $mdl_lang["accounts"]["acc-mov-date-title-ph"],
			'acc-mov-status-title' => $mdl_lang["accounts"]["acc-mov-status-title"],
			'acc-mov-lg-save' => $mdl_lang["accounts"]["acc-mov-lg-save"],
			'acc-mov-lg-cancel' => $mdl_lang["accounts"]["acc-mov-lg-cancel"]
		],
		bo3::mdl_load("templates/accounts.tpl")
	);


	include "pages/module-core.php";
