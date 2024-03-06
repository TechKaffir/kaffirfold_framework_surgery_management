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

		$mail->Host       = 'smtp.gmail.com';                     
		$mail->SMTPAuth   = true;                                   
		$mail->Username   = 'mbodlajonguxolo@gmail.com';                     
		$mail->Password   = 'Coding073#';                               
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           
		$mail->Port       = 587;                                   

		// Content
		$mail->isHTML(true);  

		return $mail;
	}
}
