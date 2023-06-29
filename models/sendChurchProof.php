<?php
require '../extensions/PHPMailer-master/src/Exception.php';
require '../extensions/PHPMailer-master/src/PHPMailer.php';
require '../extensions/PHPMailer-master/src/SMTP.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if($_FILES['church_prof']){
    $file_tmp =   $_FILES['church_prof']['tmp_name'];
    $file_name =    $_FILES['church_prof']['name'];
    echo  $file_tmp;


    		// to super user
		$mail = new PHPMailer(true);
		try {

		    //Server settings
			// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'testclgf@gmail.com';                     //SMTP username
			$mail->Password   = 'hggcmqxkxorglsrr';                               //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			$mail->setFrom('jajajo@gmail.com', 'JAJAJo');
			$mail->addAddress('janryanadivinagracia25@gmail.com', 'Joe User');     //Add a recipient

			
			//Attachments
			// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
			$mail->addAttachment($file_tmp, 'church.jpg');    //Optional name
			// $mail->addAttachment($data['user_proof'], 'user.jpg');    //Optional name

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Church Registration';
			$mail->Body    = '<b>ACCOUNT ID: SAMPLEID</b>

								<h4>Church Name: CHURCH NAME </h4>
								<h4>Church Name: CHURCH ADDRESS </h4>
								<h4>Church Name: CHURCH CONTACT NUMBER </h4>

								<h4>Church Name: USER NAME </h4>
								<h4>Church Name: USER DESIGNATION </h4>
								<h4>Church Name: USER CONTACT NUMBER </h4>';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
				$mail->send();
			echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}

}

?>