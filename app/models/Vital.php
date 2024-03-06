<?php

/**
 * Vital Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class Vital
{

	use Model;

	protected $table = 'vital_signs';
	protected $primaryKey = 'sign_ID'; 

	protected $allowedColumns = [
		'date',
		'patient',
		'blood_sugar',
		'blood_pressure',
		'pulse_rate',
		'urinalysis',
		'pregnancy_test',
		'resting_ecg',
		'oxygen_saturation',
		'weight',
		'height',
		'temperature',
		'BMI',
		'comments',
		'created_by',
		'updated_by',
		'deleted_by',
		'date_created',
		'date_updated',
	];

	public function validate($data, $id = null)
	{
		$action = '';
		$this->errors = [];

		if (empty($data['blood_sugar'])) {
			$this->errors['blood_sugar'] = "Blood Sugar is required";
		}

		if (empty($data['blood_pressure'])) {
			$this->errors['blood_pressure'] = "Blood Pressure is required";
		} 
		if (empty($data['pulse_rate'])) {
			$this->errors['pulse_rate'] = "Pulse Rate is required";
		} 

		if (empty($this->errors)) {
			return true;
		}

		return false;
	}

	public function vitalsWithPatientName()
	{
		$sql = "SELECT vs.sign_ID, vs.date, vs.blood_sugar, vs.blood_pressure, vs.pulse_rate, vs.created_by, vs.date_created, p.id, p.Surname, p.First_Name
				FROM vital_signs vs
				JOIN patients p ON vs.patient = p.id
				ORDER BY date DESC";
		$result = $this->query($sql);
		if($result)
		{
			return $result;
		}
	}
}

