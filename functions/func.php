<?php

require_once ('Exception.php');
require_once ('PHPMailer.php');
require_once ('SMTP.php');


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';



function send_mail_to_me($tmp, $file_name, $subject, $message) {
	$mail = new PHPMailer(true);

	try {
		//Server settings
		$mail->SMTPDebug = 0;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = 'edubusiness.tech@gmail.com';                     //SMTP username
		$mail->Password   = 'sastmmgyhyqcllko';                               //SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
	
		//Recipients
		$mail->setFrom('edubusiness.tech@gmail.com', 'Site Project');
		$mail->addAddress('edubusiness.tech@gmail.com');     //Add a recipient


        $mail->addAttachment($tmp,$file_name);
	
	
		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = $subject;
		$mail->Body    = $message;
	
		$mail->send();
		// echo 'Message has been sent';
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}


// function send_mail($to, $subject, $message) {
// 	$mail = new PHPMailer(true);

// 	try {
// 		//Server settings
// 		$mail->SMTPDebug = 0;                      //Enable verbose debug output
// 		$mail->isSMTP();                                            //Send using SMTP
// 		$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
// 		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
// 		$mail->Username   = 'edubusiness.tech@gmail.com';                     //SMTP username
// 		$mail->Password   = 'sastmmgyhyqcllko';                               //SMTP password
// 		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
// 		$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
	
// 		//Recipients
// 		$mail->setFrom("edubusiness.tech@gmail.com", 'Kad-Gp solutions');
// 		$mail->addAddress($to);     //Add a recipient


//         // $mail->addAttachment($tmp,$file_name);
	
	
// 		//Content
// 		$mail->isHTML(true);                                  //Set email format to HTML
// 		$mail->Subject = $subject;
// 		$mail->Body    = $message;
	
// 		$mail->send();
// 		// echo 'Message has been sent';
// 	} catch (Exception $e) {
// 		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// 	}
// }