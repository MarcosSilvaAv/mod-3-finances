<?php

switch ($_GET["r"]) {
	/*ACCOUNTS*/
	case 'add-account':
		$tpl = addAccount($_POST);
		break;
	case 'get-account-movs':
		$tpl = getAccountsMovs();
		break;
	case 'get-account-details':
		$tpl = getAccountDetails();
		break;

	default:
		$tpl = "";
		break;
}

function addAccount($post) {
	global $authData, $mdl_lang;

	$toReturn = [
		"status" => false,
		"message" => ""
	];

	if(isset($post["inputAccName"]) && !empty($post["inputAccName"])){
		if(isset($post["inputAccIban"]) && !empty($post["inputAccIban"])){
			if(isset($authData["id"]) && !empty($authData["id"])){

				$account = new finances();

				$account->setName($post["inputAccName"]);
				$account->setDesc($post["inputAccDesc"]);
				$account->setAccNum($post["inputAccNumber"]);
				$account->setIban($post["inputAccIban"]);
				$account->setSwift($post["inputAccSwift"]);
				$account->setInstName($post["inputAccInstName"]);
				$account->setSort(isset($post["inputAccSort"]) ? $post["inputAccSort"] : 0);
				$account->setCode($post["inputAccCode"]);
				$account->setBalance(0);
				$account->setUserId($authData["id"]);
				$account->setDate();
				$account->setDateUpdate();
				$account->setStatus(isset($post["inputAccStatus"]) ? $post["inputAccStatus"] : 0);

				if($account->insertAcc()) {
					$toReturn["status"] = true;
				} else {
					$toReturn = [
						"status" => false,
						"message" => $mdl_lang["accounts"]["api-error-on-insert"]
					];
				}

			} else {
				$toReturn = [
					"status" => false,
					"message" => $mdl_lang["accounts"]["api-no-user-logged"]
				];
			}

		} else {
			$toReturn = [
				"status" => false,
				"message" => $mdl_lang["accounts"]["api-no-iban"]
			];
		}

	} else {
		$toReturn = [
			"status" => false,
			"message" => $mdl_lang["accounts"]["api-no-name"]
		];
	}

	return json_encode($toReturn);
}

function getAccountsMovs() {
	global $authData, $mdl_lang, $id;

	$movs = null;

	$toReturn = [
		"status" => false,
		"message" => ""
	];

	$account = new finances();
	$movs = $account->returnAllAccMovs("account_id = {$id}", "date DESC");

	if($movs && count($movs) > 0) {
		$toReturn = [
			"status" => true,
			"message" => $movs
		];
	}

	return json_encode($toReturn);

}

function getAccountDetails() {
	global $authData, $mdl_lang, $id;

	$acc_details = null;

	$toReturn = [
		"status" => false,
		"message" => ""
	];

	$account = new finances();
	$account->setId($id);
	$acc_details = $account->returnOneAcc();

	if($acc_details && count($acc_details) > 0) {
		$toReturn = [
			"status" => true,
			"message" => $acc_details
		];
	}

	return json_encode($toReturn);

}
