<?php

/**
 * ConsultationBooking Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class ConsultationBooking
{

	use Model;

	protected $table = 'consultation_booking';
	protected $primaryKey = 'id'; // make sure it matches the one in your DB table

	protected $allowedColumns = [
		'id',
		'patient',
		'cash_or_medical',
		'funds_status',
		'status',
		'Notes',
		'created_by',
		'updated_by',
		'date_updated',
	];

	public function validate($data, $id = null)
	{
		$action = '';
		$this->errors = [];

		if ($data['cash_or_medical'] == 'Select Payment') {
			$this->errors['cash_or_medical'] = "Select Payment Method";
		}
		if ($data['funds_status'] == 'Select Funds Status') {
			$this->errors['funds_status'] = "Select Funds Status";
		}
		if ($data['status'] == 'Select Booking Status') {
			$this->errors['status'] = "Select Booking Status";
		}

		if (empty($this->errors)) {
			return true;
		}

		return false;
	}

	public function todaysBookings() 
	{
		$sql = "SELECT cb.*, p.id AS patient_id, p.Surname, p.First_Name,
                CONVERT_TZ(cb.reg_date, 'America/Phoenix', 'Africa/Johannesburg') AS converted_reg_date
                FROM consultation_booking cb
                JOIN patients p ON cb.patient = p.id
                WHERE DATE(cb.reg_date) = CURDATE();";
		$result = $this->query($sql);
		if($result)
		{
			return $result;
		}
	}
	public function allTimeBookingsPerPatient($id) 
	{
		$sql = "SELECT cb.*, p.id AS patient_id, p.Surname, p.First_Name
				FROM consultation_booking cb
				JOIN patients p ON cb.patient = p.id
				WHERE p.id = ?;
		";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$result = $stmt->fetchAll(PDO::FETCH_OBJ);
		if($result)
		{
			return $result;
		}
	}
	public function stbclaims($id) // singleTodaysBooking (claims)
	{
		$sql = "SELECT cb.id, cb.patient, cb.reg_date, cb.cash_or_medical, p.id AS patient_id, p.Surname, p.First_Name
				FROM consultation_booking cb
				JOIN patients p ON cb.patient = p.id
				WHERE p.id = ?;
		";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$result = $stmt->fetch(PDO::FETCH_OBJ);
		if($result)
		{
			return $result;
		}
	}

	public function updateVisitStatusByNurse($patient)
	{
		$sql = "UPDATE consultation_booking
				SET status = 'Vitals captured: Nurse'
				WHERE patient = ?
				";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$patient]);

		return true;
	}

	public function updateVisitStatusByDoctor($patient)
	{
		$sql = "UPDATE consultation_booking
				SET status = 'Examined by Doctor'
				WHERE patient = ?
				";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$patient]);

		return true;
	}
	public function updateVisitStatusByPharmacy($patient)
	{
		$sql = "UPDATE consultation_booking
				SET status = 'Medication dispensed'
				WHERE patient = ?
				";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$patient]);

		return true;
	}
	public function updateVisitStatusByClaims($patient)
	{
		$sql = "UPDATE consultation_booking
				SET status = 'Claim processed'
				WHERE patient = ?
				";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$patient]); 

		return true;
	} 
}
