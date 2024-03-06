<?php

/**
 * Queue Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class Queue
{

	use Model;

	protected $table = 'queue'; 
	protected $primaryKey = 'id'; // make sure it matches the one in your DB table


	protected $allowedColumns = [
		'id',
		'patient',
		'created_by',
		'updated_by',
		'date_updated',
	];

	public function validate($data, $id = null)
	{
		$this->errors = [];

		if ($data['patient'] == 'Select Patient') {
			$this->errors['patient'] = "Patient is required";
		}

		if (empty($this->errors)) {
			return true;
		}

		return false;
	}

	public function patientQueue()
	{
		$sql = "SELECT q.*, p.id, p.Surname, p.First_Name 
				FROM queue q
				JOIN patients p ON q.patient = p.id 
				WHERE DATE(q.date_created) = CURDATE()
				ORDER BY q.date_created ASC 
			";
		$result = $this->query($sql);
		return $result;
	}

	public function updateQueueStatusByNurse($patient)
	{
		$sql = "UPDATE queue
				SET status = 'Vitals captured, now waiting for the doctor'
				WHERE patient = ?
				";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$patient]);

		return true;
	}
	public function updateQueueStatusByDoctor($patient)
	{
		$sql = "UPDATE queue
				SET status = 'Examined by Doctor, now waiting for meds'
				WHERE patient = ?
				";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$patient]);

		return true;
	}
	public function updateQueueStatusByPharmacy($patient)
	{
		$sql = "UPDATE queue
				SET status = 'Meds dispensed, Patient consultation is over'
				WHERE patient = ?
				";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$patient]);

		return true;
	}

}
