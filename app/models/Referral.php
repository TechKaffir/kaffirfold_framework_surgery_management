<?php

/**
 * Referral Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class Referral
{
	use Model;

	protected $table = 'referrals';
	protected $primaryKey = 'id'; 
	
	protected $allowedColumns = [
		'Date',
		'Patient',
		'Med_Centre',
		'Type_of_treatment',
		'Status',
		'Message',
		'created_by',
		'updated_by',
		'date_updated',
	];

	public function validate($post_data, $id = null)
	{
		
		$this->errors = [];

		if ($post_data['Patient'] == 'Select Patient') {
			$this->errors['Patient'] = "Patient is required";
		}
		if (empty($post_data['Med_Centre'])) {
			$this->errors['Med_Centre'] = "Med Centre is required";
		}
		if (empty($post_data['Type_of_treatment'])) {
			$this->errors['Type_of_treatment'] = "Type of treatment is required";
		}
		
		
		if (empty($this->errors)) {
			return true;
		}

		return false;
	}
}
