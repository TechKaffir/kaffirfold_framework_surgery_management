<?php

/**
 * Auth class 
 */

defined('ROOTPATH') or exit('Access Denied!');

class Auth
{
	use Controller;

	public function verifySickNote()
	{
		$sick_cert = new SickCertificate();

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$sicknote = $sick_cert->sickVerify($_POST['Surname'],$_POST['First_Name'],$_POST['cons_date']);
			
			if($sicknote && $_POST['Surname'] == $sicknote->Surname && $_POST['First_Name'] == $sicknote->First_Name && $_POST['cons_date'] == $sicknote->cons_date)
			{
				Util::setFlash('sicknote_verify_success',"Sick Certificate verified: Serial number - $sicknote->label");
			} else 
			{
				Util::setFlash('sicknote_verify_error',"We do not have records on that sick note. Investigation required!!");
			}
		} 
		
		$data['page_title'] = APP_NAME . ' Sick Note Verification';
		$this->view('auth/sicknote-verify',$data);
	}
}
