<?php

/**
 * Pharmacy Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class Pharmacy
{

	use Model;

	protected $table = 'pharmacy';
	protected $primaryKey = 'id';


	protected $allowedColumns = [
		'patient',
		'date',
		'plan_view',
		'actual',
		'notes',
		'created_by',
		'updated_by',
		'date_updated',
	];

	public function validate($data, $id = null)
	{
		$this->errors = [];

		if (empty($data['actual'])) {
			$this->errors['actual'] = "Actual dispensed Meds -required";
		}

		if (empty($this->errors)) {
			return true;
		}

		return false;
	}

	public function medDispensePast30()
	{
		$sql = "SELECT ph.*, p.id, p.Surname, p.First_Name  
				FROM pharmacy ph
				JOIN patients p ON ph.patient = p.id
				WHERE date BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 MONTH) AND CURDATE();
		";
		$result = $this->query($sql);

		if ($result) {
			return $result;
		}
	}

	public function medsDispensedWithPatientName()
	{
		$sql = "SELECT ph.*, p.id AS patient_id, p.Surname, p.First_Name  
				FROM pharmacy ph
				JOIN patients p ON ph.patient = p.id
				ORDER BY date DESC
		";
		$result = $this->query($sql);

		if ($result) {
			return $result;
		}
	}
}
