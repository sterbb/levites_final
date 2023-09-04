<?php
require '../extensions/PHPMailer/src/Exception.php';
require '../extensions/PHPMailer/src/PHPMailer.php';
require '../extensions/PHPMailer/src/SMTP.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

 $name = $_POST['name'];
 $email = $_POST['email'];
 $group_name = $_POST['group_name'];
 $event_date = $_POST['event_date'];
 $event_time = $_POST['event_time'];
 $event_date2 = $_POST['event_date2'];
 $event_time2 = $_POST['event_time2'];
 $event_title = $_POST['event_title'];

    		// to super user
		$mail = new PHPMailer(true);
		try {

		    //Server settings
			// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'levites@levites.net';                     //SMTP username islan pa
			$mail->Password   = 'Levitespass1234!';                               //SMTP password 
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
			$mail->setFrom('levites@levites.net', 'Levites');


            //email sa dason
			$mail->addAddress($email, $name);     //Add a recipient


			// $mail->addAttachment($data['user_proof'], 'user.jpg');    //Optional name

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Group Designation';
			$mail->Body    = '<b>ACCOUNT ID: SAMPLEID</b>	
                                 <h4>YOU ARE ASSIGNED TO: '.$group_name.' </h4>
								<h4>Event Title: '.$event_title.' </h4>
                                <h4>Event Date: '.$event_date.' - '.$event_date2.'</h4>
                                <h4>Event Time: '.$event_time.' - '.$event_time2.' </h4>';
                                
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
				$mail->send();
			echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}

?>