<?php

/**
 * SickCertificate Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

Use Endroid\QrCode\QrCode;
Use Endroid\QrCode\Writer\PngWriter;
Use Endroid\QrCode\Label\Label;


class SickCertificate
{
	use Model;

	protected $table = 'sick_certificate';
	protected $primaryKey = 'id'; 


	protected $allowedColumns = [
		'title_1',
		'patient',
		'employment_number',
		'cons_date',
		'cons_time',
		'title_2',
		'title_3',
		'sick_from_date',
		'clinical_diagnosis',
		'title_4',
		'fit_date',
		'remarks',
		'date_of_issue',
		'label',
		'created_by',
		'updated_by',
		'date_updated',
	];

	public function validate($post_data, $id = null)
	{
		
		$this->errors = [];

		
		if (empty($post_data['title_1'])) {
			$this->errors['title_1'] = "Title One is required";
		}
		if ($post_data['patient'] == 'Select Patient') {
			$this->errors['patient'] = "Patient fullname(s) - required";
		}
		if (empty($post_data['cons_date'])) {
			$this->errors['cons_date'] = "Consultation date is required";
		}
		if (empty($post_data['cons_time'])) {
			$this->errors['cons_time'] = "Consultation time is required";
		}
		if (empty($post_data['sick_from_date'])) {
			$this->errors['sick_from_date'] = "Sick from date is required";
		}
		if (empty($post_data['clinical_diagnosis'])) {
			$this->errors['clinical_diagnosis'] = "Clinical diagnosis is required";
		}
		if (empty($post_data['fit_date'])) {
			$this->errors['fit_date'] = "Fit Date is required";
		}
		
		if (empty($this->errors)) {
			return true;
		}

		return false;
	}

	public function sickCertsWithPatientName()
	{
		$sql = "SELECT sc.*, p.id AS patient_id, p.Surname, p.First_Name  
				FROM sick_certificate sc
				JOIN patients p ON sc.patient = p.id
				ORDER BY cons_date DESC
		";
		$result = $this->query($sql);

		if ($result) {
			return $result;
		}
	}
	public function specificPatientSickCert($id)
	{
		$sql = "SELECT sc.*, p.id AS patient_id, p.Surname, p.First_Name  
				FROM sick_certificate sc
				JOIN patients p ON sc.patient = p.id
				WHERE p.id = ?
		";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$result = $stmt->fetch(PDO::FETCH_OBJ);
		if ($result) {
			return $result;
		}
	}

	public function patientAllSickCertificates($patient)
	{
		$sql = "SELECT * FROM sick_certificate WHERE patient = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$patient]);
		$result = $stmt->fetchAll(PDO::FETCH_OBJ);
		if($result)
		{
			return $result;
		}
	}
	
}
