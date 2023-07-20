<?php
require '../extensions/PHPMailer/src/Exception.php';
require '../extensions/PHPMailer/src/PHPMailer.php';
require '../extensions/PHPMailer/src/SMTP.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

 $email = $_POST['email'];
 $group_name = $_POST['group_name'];
 $event_date = $_POST['event_date'];
 $event_title = $_POST['event_title'];
 $event_time = $_POST['event_time'];
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
            //email sa dason
			$mail->addAddress('janryanadivinagracia25@gmail.com', 'Joe User');     //Add a recipient


			// $mail->addAttachment($data['user_proof'], 'user.jpg');    //Optional name

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Church Registration';
			$mail->Body    = '<b>ACCOUNT ID: SAMPLEID</b>

                                 <h4>YOU ARE ASSIGNED TO: '.$group_name.' </h4>
								<h4>Event Title: '.$event_title.' </h4>
                                <h4>Event Date: '.$event_date.' </h4>
                                <h4>Event Time: '.$event_time.' </h4>';
                                
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
				$mail->send();
			echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}

?>