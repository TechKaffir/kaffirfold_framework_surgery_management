<?php

/**
 * FollowUp Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class FollowUp
{

	use Model;

	protected $table = 'followup';
	protected $primaryKey = 'id';


	protected $allowedColumns = [
		'id',
		'patient',
		'modus',
		'intention',
		'report',
		'created_by',
		'updated_by',
		'date_updated',
	];

	public function validate($data, $id = null)
	{
		$this->errors = [];

		if ($data['modus'] == 'Select Modus') {
			$this->errors['modus'] = "Modus is compulsory";
		}
		if (empty($data['intention'])) {
			$this->errors['intention'] = "Intention is required";
		}
		if (empty($data['report'])) {
			$this->errors['report'] = "Report cannot be empty";
		}


		if (empty($this->errors)) {
			return true;
		}

		return false;
	}

	public function fuReports()
	{
		$sql = "SELECT fu.*, p.id AS patient_id, p.Surname, p.First_Name
				FROM followup fu 
				INNER JOIN patients p ON fu.patient = p.id 
				ORDER BY fu.id DESC
		";
		$report = $this->query($sql);
		return $report;
	}
	public function singlefuReport($id)
	{
		$sql = "SELECT fu.*, p.id, p.Surname, p.First_Name
				FROM followup fu 
				JOIN patients p ON fu.patient = p.id 
				WHERE p.id = ?
				ORDER BY fu.id DESC
		";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$report = $stmt->fetch(PDO::FETCH_OBJ);
		return $report;
	}
}
