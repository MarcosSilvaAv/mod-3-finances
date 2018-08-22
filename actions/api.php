<?php

switch ($_GET["r"]) {
	/*ACCOUNTS*/
	case 'get-accounts':
		$tpl = getAccounts($_POST);
		break;
	case 'add-account':
		$tpl = addAccount($_POST);
		break;
	case 'add-account-mov':
		$tpl = addMovement($_POST);
		break;
	case 'get-account-mov':
		$tpl = getMovement($_POST);
		break;

	default:
		$tpl = "";
		break;
}

function getAccounts($post){
	global $authData, $mdl_lang;

	$toReturn = [
		"status" => false,
		"message" => []
	];

	$acc_obj = new c3_finances();
	$acc_list = $acc_obj->returnAllAccs(null, 'date asc, sort asc');

	foreach ($acc_list as $acc) {
		if (!isset($list)) {
			$list = [];
		}

		array_push($list, [
			"id" => $acc->id,
			"acc-name" => $acc->name,
			"acc-desc" => $acc->description,
			"institution-name" => $acc->institution_name,
			"balance" => $acc->balance,
			"date" => date("Y-m-d", strtotime($acc->date)),
			"status" => ($acc->status) ? "fa-toggle-on" : "fa-toggle-off",
		]);
	}

	if(isset($list) && count($list) > 0){
		$toReturn["message"] = $list;
		$toReturn["status"] = true;
	}

	return json_encode($toReturn);

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

				$account = new c3_finances();

				$account->setName($post["inputAccName"]);
				$account->setDesc($post["inputAccDesc"]);
				$account->setAccNum($post["inputAccNumber"]);
				$account->setIban($post["inputAccIban"]);
				$account->setSwift($post["inputAccSwift"]);
				$account->setInstName($post["inputAccInstName"]);
				$account->setSort(isset($post["inputAccSort"]) && !empty($post["inputAccSort"]) ? $post["inputAccSort"] : 0);
				$account->setCode($post["inputAccCode"]);
				$account->setBalance(0);
				$account->setUserId($authData["id"]);
				$account->setDate();
				$account->setDateUpdate();
				$account->setStatus(isset($post["inputAccStatus"]) && !empty($post["inputAccStatus"]) ? $post["inputAccStatus"] : 0);

				if($account->insertAcc()) {
					$toReturn = [
						"status" => true,
						"message" => [
							"title" => $mdl_lang["accounts"]["api-success-on-insert-title"],
							"text" => $mdl_lang["accounts"]["api-success-on-insert-text"]
						]
					];
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

function addMovement($post) {
	global $authData, $mdl_lang;

	$toReturn = [
		"status" => false,
		"message" => ""
	];

	if(isset($post["inputAccMovName"]) && !empty($post["inputAccMovName"])){
		if(isset($post["inputAccMovValue"]) && !empty($post["inputAccMovValue"])){
			if(isset($post["inputAccMovDate"]) && !empty($post["inputAccMovDate"])){
				if(isset($authData["id"]) && !empty($authData["id"])){
					$mov = new c3_finances();
					$mov->setAccId($post["inputAccId"]);
					$mov->setName($post["inputAccMovName"]);
					$mov->setDesc($post["inputAccMovDesc"]);
					$mov->setValue($post["inputAccMovValue"]);
					$mov->setDate($post["inputAccMovDate"]);
					$mov->setDateUpdate();
					$mov->setUserId($authData["id"]);
					$mov->setStatus(isset($post["inputAccMovStatus"]) && !empty($post["inputAccMovStatus"]) ? $post["inputAccMovStatus"] : 0);

					if($mov->insertAccMov() && $mov->refreshAccBalance()) {
						$toReturn = [
							"status" => true,
							"message" => [
								"title" => $mdl_lang["account-movs"]["api-success-on-insert-title"],
								"text" => $mdl_lang["account-movs"]["api-success-on-insert-text"]
							]
						];
					} else {
						$toReturn = [
							"status" => false,
							"message" => $mdl_lang["account-movs"]["api-error-on-insert"]
						];
					}

				} else {
					$toReturn = [
						"status" => false,
						"message" => $mdl_lang["account-movs"]["api-no-login"]
					];
				}
			} else {
				$toReturn = [
					"status" => false,
					"message" => $mdl_lang["account-movs"]["api-no-date"]
				];
			}
		} else {
			$toReturn = [
				"status" => false,
				"message" => $mdl_lang["account-movs"]["api-no-value"]
			];
		}
	} else {
		$toReturn = [
			"status" => false,
			"message" => $mdl_lang["account-movs"]["api-no-name"]
		];
	}

	// {inputAccMovName: "123", inputAccMovDesc: "123", inputAccMovValue: "123", inputAccMovDate: "2018-01-29 12:00", inputAccMovStatus: "1"}
    //
	// $this->acc_id,
	// $this->name,
	// $this->desc,
	// $this->value,
	// $this->user_id,
	// $this->date,
	// $this->date_update,
	// $this->status


	return json_encode($toReturn);
}

function getMovement($post){
	global $authData, $mdl_lang;

	$toReturn = [
		"status" => false,
		"message" => []
	];

	$acc_obj = new c3_finances();
	$acc_obj->setId($post["id"]);
	$acc_list = $acc_obj->returnOneAccMov(null, 'date asc, sort asc');

	if(isset($acc_list)){
		$toReturn["message"] = $acc_list;
		$toReturn["status"] = true;
	}

	return json_encode($toReturn);

}
