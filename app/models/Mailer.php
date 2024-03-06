<?php

/**
 * Mailer Model class
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

defined('ROOTPATH') or exit('Access Denied!');

class Mailer
{

	use Model;

	public function sendMail()
	{

		//Create an instance; passing `true` enables exceptions
		$mail = new PHPMailer(true); 
		
		// Server settings
		// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
		$mail->isSMTP();      

		$mail->Host       = ''; // e.g. smtp.gmail.com (Gmail)                   
		$mail->SMTPAuth   = true;                                   
		$mail->Username   = ''; // Email sending from                   
		$mail->Password   = ''; // This email password                              
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           
		$mail->Port       = 587; // 465 (if other than ENCRYPTION_STARTTLS )                                  

		// Content
		$mail->isHTML(true);  

		return $mail;
	}
}
