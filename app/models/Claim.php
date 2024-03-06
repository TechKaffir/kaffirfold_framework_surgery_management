<?php

/**
 * Claim Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class Claim
{

	use Model;

	protected $table = 'claims';
	protected $primaryKey = 'id'; 


	protected $allowedColumns = [
		'patient',
		'consultation_date',
		'claim_date',
		'note',
		'created_by',
		'updated_by',
		'date_created',
		'date_updated',
	];

	public function validate($data, $id = null)
	{
		$action = '';
		$this->errors = [];

		if (empty($this->errors)) {
			return true;
		}

		return false;
	}

	public function allClaims()
	{
		$sql = "SELECT c.*, p.id AS patient_id, p.Surname, p.First_Name
				FROM claims c
				JOIN patients p ON c.patient = p.id;
		";
		$result = $this->query($sql);
		if($result)
		{
			return $result;
		}
	}
}
