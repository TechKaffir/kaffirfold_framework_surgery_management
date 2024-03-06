<?php

/**
 * Patient Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class Patient
{
	use Model;

	protected $table = 'patients';
	protected $primaryKey = 'id';

	/* In the case of Users table */
	protected $UniqueColumn = 'identity_number';

	protected $allowedColumns = [
		'id',
		'File_Number',
		'Surname',
		'First_Name',
		'identity_number',
		'Clan_Name',
		'occupation',
		'date_of_birth',
		'Age',
		'home_language',
		'marital_status',
		'contact_number',
		'patient_email',
		'responsible_surname',
		'responsible_firstName',
		'responsible_IdNumber',
		'home_address',
		'Employer',
		'work_contact_number',
		'medical_aid_scheme',
		'med_aid_number',
		'next_of_kin',
		'contact_no',
		'created_by',
		'updated_by',
		'date_created',
		'date_updated',
	];

	public function validate($post_data, $id = null)
	{
		
		$this->errors = [];

		
		if (empty($post_data['Surname'])) {
			$this->errors['Surname'] = "Surname is required";
		}
		if (empty($post_data['First_Name'])) {
			$this->errors['First_Name'] = "First_Name is required";
		}
		if (empty($post_data['identity_number'])) {
			$this->errors['identity_number'] = "ID number is required";
		}
		if (empty($post_data['home_language'])) {
			$this->errors['home_language'] = "Home Language is required";
		}
		if (empty($post_data['contact_number'])) {
			$this->errors['contact_number'] = "Phone is required";
		} elseif (!preg_match("/^[0-9 ]+$/", $post_data['contact_number'])) {
			$this->errors['contact_number'] = "Phone can only have numeric values";
		}
		if (empty($post_data['responsible_surname'])) {
			$this->errors['responsible_surname'] = " The surname of the person responsible for the account is required";
		}
		if (empty($post_data['responsible_firstName'])) {
			$this->errors['responsible_firstName'] = "First Name of the person responsible for the account is required";
		}
		if (empty($post_data['responsible_IdNumber'])) {
			$this->errors['responsible_IdNumber'] = "ID number of the person responsible for the account is required";
		}
		if (empty($post_data['home_address'])) {
			$this->errors['home_address'] = "Home Address is required";
		}
		if (empty($post_data['next_of_kin'])) {
			$this->errors['next_of_kin'] = "Next of kin required";
		}
		if (empty($post_data['contact_no'])) {
			$this->errors['contact_no'] = "Next of kin contact number is required";
		} elseif (!preg_match("/^[0-9 ]+$/", $post_data['contact_no'])) {
			$this->errors['contact_no'] = "Phone can only have numeric values";
		}
		if (!empty($post_data['patient_email']) && !filter_var($post_data['patient_email'], FILTER_VALIDATE_EMAIL)) {
			$this->errors['patient_email'] = "Email is not valid";
		} else
			if ($this->first(['patient_email' => $post_data['patient_email']], ['id' => $id])) {
				$this->errors['patient_email'] = "Email is already in use!";
			}

		if ($post_data['marital_status'] == 'Select Marital Status') {
			$this->errors['marital_status'] = "Marital Status is required";
		}


		if (empty($this->errors)) {
			return true;
		}

		return false;
	}

	public function patients()
	{
		$sql = "SELECT id, First_Name, Surname, contact_number, medical_aid_scheme FROM patients ORDER BY Surname DESC";
		$result = $this->query($sql);
		if($result)
		{
			return $result;
		}
	}

	public function vitals($id)
	{
		$sql = "SELECT * FROM vital_signs WHERE patient = ? ORDER BY date DESC";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);
		
		$result = $stmt->fetchAll(PDO::FETCH_OBJ);
		if($result)
		{
			return $result;
		}
	}
	public function doctorsNotes($id)
	{
		$sql = "SELECT * FROM doctors_note WHERE patient = ? ORDER BY date DESC";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);
		
		$result = $stmt->fetchAll(PDO::FETCH_OBJ);
		if($result)
		{
			return $result;
		}
	}
	public function todaysdoctorsNotes($id)
	{
		$sql = "SELECT * FROM doctors_note WHERE DATE(date) = CURDATE() AND patient = ? ORDER BY date DESC";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);
		
		$result = $stmt->fetchAll(PDO::FETCH_OBJ);
		if($result)
		{
			return $result;
		}
	}

	public function patientsNamesOnly()
	{
		$sql = "SELECT id, First_Name, Surname FROM patients ORDER BY Surname DESC";
		$result = $this->query($sql);
		if($result)
		{
			return $result;
		}
	}

	public function singlePatientName($id)
	{
		$sql = "SELECT id, First_Name, Surname 
				FROM patients 
				WHERE id = ?
				ORDER BY Surname DESC";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$result = $stmt->fetch(PDO::FETCH_OBJ);
		
		if($result)
		{
			return $result;
		}
	}
}
