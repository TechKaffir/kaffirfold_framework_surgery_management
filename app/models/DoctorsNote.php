<?php

/**
 * DoctorsNotes Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class DoctorsNote
{

	use Model;

	protected $table = 'doctors_note';
	protected $primaryKey = 'note_ID'; 

	protected $allowedColumns = [
		'note_ID',
		'date',
		'Time',
		'patient',
		'Relevant_History',
		'Comobidities',
		'Clinical_Examination',
		'Diagnosis',
		'Plan',
		'Return_Date',
		'created_by',
		'updated_by',
		'date_updated',
	];

	public function validate($data, $id = null)
	{
		$this->errors = [];

		if (empty($data['Diagnosis'])) {
			$this->errors['Diagnosis'] = "<em>** Diagnosis is required **</em>";
		}
		if (empty($data['Plan'])) {
			$this->errors['Plan'] = "<em>** Plan is required **</em>";
		}

		if (empty($this->errors)) {
			return true;
		}

		return false;
	}

	public function drNotesList()
	{
		$sql = "SELECT * FROM doctors_note ORDER BY date DESC LIMIT 100";
		$result = $this->query($sql);
		if($result)
		{
			return $result;
		}
	}
	public function returnDates()
	{
		$sql = "SELECT dn.note_ID, dn.date, dn.patient, dn.Return_Date, p.id, p.Surname, p.First_Name
				FROM doctors_note dn
				JOIN patients p ON dn.patient = p.id 
		 		WHERE Return_Date > CURDATE() 
				ORDER BY Return_Date";
		$result = $this->query($sql);
		if($result)
		{
			return $result;
		}
	}
}
