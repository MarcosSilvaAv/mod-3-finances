<?php

class c3_finances{

	protected $id;
	protected $name;
	protected $desc;
	protected $account_number;
	protected $iban;
	protected $swift;
	protected $institution_name;
	protected $sort = 0;
	protected $code;
	protected $balance;
	protected $user_id;
	protected $date;
	protected $date_update;
	protected $status = false;
	protected $acc_id;
	protected $value;

	public function __construct() {}

	public function setId($i) {
		$this->id = $i;
	}

	public function setName($n) {
		$this->name = $n;
	}

	public function setDesc($d) {
		$this->desc = $d;
	}

	public function setAccNum($a) {
		$this->account_number = $a;
	}

	public function setIban($i) {
		$this->iban = $i;
	}

	public function setSwift($s) {
		$this->swift = $s;
	}

	public function setInstName($i) {
		$this->institution_name = $i;
	}

	public function setSort($s) {
		$this->sort = $s;
	}

	public function setCode($c) {
		$this->code = $c;
	}

	public function setBalance($b) {
		$this->balance = $b;
	}

	public function setUserId($u) {
		$this->user_id = $u;
	}

	public function setDate($d = null) {
		$this->date = ($d !== null) ? $d : date("Y-m-d H:i:s", time());
	}

	public function setDateUpdate($d = null) {
		$this->date_update = ($d !== null) ? $d : date("Y-m-d H:i:s", time());
	}

	public function setStatus($s) {
		$this->status = $s;
	}

	public function setAccId($a) {
		$this->acc_id = $a;
	}

	public function setValue($v) {
		$this->value = $v;
	}

	public function returnObject() {
		return get_object_vars($this);
	}

	public function insertAcc() {
		global $cfg, $db;

		$query = sprintf("INSERT INTO %s_3_finances_accounts (name, description, account_number, iban, swift, institution_name, sort, code, balance, user_id, date, date_update, status)
			VALUES ('%s', '%s', '%s', '%s', '%s', '%s', %s, '%s', %s, %s, '%s', '%s', %s)",
			$cfg->db->prefix,
			$this->name,
			$this->desc,
			$this->account_number,
			$this->iban,
			$this->swift,
			$this->institution_name,
			$this->sort,
			$this->code,
			$this->balance,
			$this->user_id,
			$this->date,
			$this->date_update,
			$this->status
			);

		if ($db->query($query)){
			return true;
		}

		return false;
	}

	public function updateAcc() {
		global $cfg, $db;

		$query = sprintf("UPDATE %s_3_finances_accounts
			SET name = '%s', description = '%s', account_number = '%s', iban = '%s', swift = '%s', institution_name = '%s', sort = %s, code = '%s', date_update = '%s', status = %s
			WHERE id = %s",
			$cfg->db->prefix,
			$this->name,
			$this->desc,
			$this->account_number,
			$this->iban,
			$this->swift,
			$this->institution_name,
			$this->sort,
			$this->code,
			$this->date_update,
			$this->status,
			$this->id
		);

		if ($db->query($query)){
			return true;
		}

		return false;
	}

	public function deleteAcc() {
		global $cfg, $db, $authData;

		$acc = new c3_finances();
		$acc->setAccId($this->acc_id);

		if($acc->deleteAllAccMovs()) {
			$acc->setId($this->acc_id);
			$acc_obj = $acc->returnOneAcc();

			$trash = new trash();
			$trash->setCode(json_encode([
					"action" => "deleteAcc",
					"acc_id" => $this->acc_id,
					"data" => $acc_obj
				]));
			$trash->setDate();
			$trash->setModule($cfg->mdl->folder);
			$trash->setUser($authData["id"]);

			if($trash->insert()) {
				$query = sprintf("DELETE
					FROM %s_3_finances_accounts
					WHERE id = %s",
					$cfg->db->prefix,
					$this->acc_id
				);

				if($db->query($query)) {
					return ($acc->returnOneAcc() == false) ? true : false;
				} else {
					return false;
				}

			} else {
				return false;
			}

		} else {
			return false;
		}

		return false;
	}

	public function returnOneAcc() {
		global $cfg, $db;

		$query = sprintf("SELECT * FROM %s_3_finances_accounts WHERE id = %s",
				$cfg->db->prefix,
				$this->id
			);

		$source = $db->query($query);

		$toReturn = $source->fetch_object();

		return $toReturn;
	}

	public function returnAllAccs($where = null, $order = null, $limit = null) {
		global $cfg, $db;

		$query = sprintf(
			"SELECT * FROM %s_3_finances_accounts
				WHERE (%s)
				%s %s",
			$cfg->db->prefix,
			(!empty($where)) ? $where : "true",
			($order !== null) ? "ORDER BY {$order}" : null,
			($limit !== null) ? "LIMIT {$limit}" : null
		);


		$source = $db->query($query);

		if ($source->num_rows > 0) {
			$toReturn = [];

			while ($data = $source->fetch_object()) {
				array_push($toReturn, $data);
			}

			return $toReturn;
		}

		return false;
	}

	public function insertAccMov() {
		global $cfg, $db;

		$query = sprintf("INSERT INTO %s_3_finances_accounts_movements (account_id, name, description, value, user_id, date, date_update, status) VALUES (%s, '%s', '%s', %s, %s, '%s', '%s', %s)",
			$cfg->db->prefix,
			$this->acc_id,
			$this->name,
			$this->desc,
			$this->value,
			$this->user_id,
			$this->date,
			$this->date_update,
			$this->status
			);

		if ($db->query($query)){
			return true;
		}

		return false;

	}

	public function updateAccMov() {
		global $cfg, $db;

		$query = sprintf("UPDATE %s_3_finances_accounts_movements
			SET name = '%s', description = '%s', value = %s, date_update = '%s', status = %s
			WHERE id = %s",
			$cfg->db->prefix,
			$this->name,
			$this->desc,
			$this->value,
			$this->date_update,
			$this->status,
			$this->id
		);

		if ($db->query($query)){
			return true;
		}

		return false;

	}

	public function deleteAccMov() {
		global $cfg, $db, $authData;

		$acc_mov = new c3_finances();
		$acc_mov->setId($this->id);
		$acc_mov_obj = $acc_mov->returnOneAccMov();

		$trash = new trash();
		$trash->setCode(json_encode([
				"action" => "deleteAccMov",
				"mov_id" => $this->id,
				"data" => $acc_movs_obj
			]));
		$trash->setDate();
		$trash->setModule($cfg->mdl->folder);
		$trash->setUser($authData["id"]);

		if($trash->insert()) {
			$query = sprintf("DELETE
				FROM %s_3_finances_accounts_movements
				WHERE id = %s",
				$cfg->db->prefix,
				$this->id
			);

			if($db->query($query)) {
				$acc_mov->setAccId($acc_mov_obj->account_id);
				$acc_mov->refreshAccBalance();

				return ($acc_mov->returnOneAccMov() == false) ? true : false;
			} else {
				return false;
			}

		} else {
			return false;
		}

		return false;
	}

	public function deleteAllAccMovs() {
		global $cfg, $db, $authData;

		$acc_movs = new c3_finances();
		$acc_movs->setId($this->acc_id);
		$acc_movs_obj = $acc_movs->returnAllAccMovs();

		$trash = new trash();
		$trash->setCode(json_encode([
				"action" => "deleteAllAccMovs",
				"acc_id" => $this->acc_id,
				"data" => $acc_movs_obj
			]));
		$trash->setDate();
		$trash->setModule($cfg->mdl->folder);
		$trash->setUser($authData["id"]);

		if($trash->insert()) {
			$query = sprintf("DELETE
				FROM %s_3_finances_accounts_movements
				WHERE account_id = %s",
				$cfg->db->prefix,
				$this->acc_id
			);

			if($db->query($query)) {
				$acc_movs->setAccId($this->acc_id);
				$acc_movs->refreshAccBalance();

				return ($acc_movs->returnAllAccMovs() == false) ? true : false;
			} else {
				return false;
			}

		} else {
			return false;
		}

		return false;
	}

	public function returnOneAccMov() {
		global $cfg, $db;

		$query = sprintf("SELECT * FROM %s_3_finances_accounts_movements WHERE id = %s",
				$cfg->db->prefix,
				$this->id
			);

		$source = $db->query($query);

		$toReturn = $source->fetch_object();

		return $toReturn;
	}

	public function returnAllAccMovs($where = null, $order = null, $limit = null) {
		global $cfg, $db;

		$query = sprintf(
			"SELECT * FROM %s_3_finances_accounts_movements
				WHERE account_id = %s AND (%s)
				%s %s",
			$cfg->db->prefix,
			$this->id,
			(!empty($where)) ? $where : "true",
			($order !== null) ? "ORDER BY {$order}" : null,
			($limit !== null) ? "LIMIT {$limit}" : null
		);


		$source = $db->query($query);

		if ($source->num_rows > 0) {
			$toReturn = [];

			while ($data = $source->fetch_object()) {
				array_push($toReturn, $data);
			}

			return $toReturn;
		}

		return false;

	}

	public function refreshAccBalance() {
		global $cfg, $db;

		$query = sprintf("SELECT round(sum(value), 2) balance
			FROM %s_3_finances_accounts_movements
			WHERE account_id = %s AND status = 1
			GROUP BY account_id",
			$cfg->db->prefix,
			$this->acc_id
		);

		$source = $db->query($query);

		$balance = 0;

		if($data = $source->fetch_object()) {
			$balance = $data->balance;
		}

		$updateQuery = sprintf("UPDATE %s_3_finances_accounts
			SET balance = %s
			WHERE id = %s",
			$cfg->db->prefix,
			$balance,
			$this->acc_id
		);

		if($db->query($updateQuery)) {
			return true;
		} else {
			return false;
		}

		return false;
	}

}
