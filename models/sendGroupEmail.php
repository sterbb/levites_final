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
			$mail->Subject = 'Levites Group Designation';
			$email_template = '<html>
			<head>
				<style>
					body {
						font-family: Arial, sans-serif;
						background-color: #f1f1f1;
					}
			
					.container {
						max-width: 350px;
						margin: 0 auto;
						height: 380px;
						padding: 20px;
						background-color: #6D7987;
						border-radius: 10px;
					}
			
					.header {
						text-align: center;
						margin-bottom: 20px;
					}
			
					.header h1 {
						color: #E1E1E8;
						font-size: 28px;
					}
			
					.logo img {
						max-width: 250px;
						text-align: center;
						margin: 0 auto;
						display: block;
					}
			
					.event-details p {
						margin-bottom: 10px;
						color: #E1E1E8;
					}
				</style>
			</head>
			<body>
				<div class="container">
					<div class="logo">
						<a class="logo" href="https://www.levites.net"><img src="cid:logo_cid" alt="Logo"></a>

					</div>
					<div class="header">
						<h1>Group Designation</h1>
					</div>
					<div class="event-details">
						<p><strong>YOU ARE ASSIGNED TO:</strong> '.$group_name.'</p>
						<p><strong>Event Title:</strong> '.$event_title.'</p>
						<p><strong>Event Date:</strong> '.$event_date.' - '.$event_date2.'</p>
						<p><strong>Event Time:</strong> '.$event_time.' - '.$event_time2.'</p>
					</div>
				</div>
			</body>
			</html>';

			$logoFilePath = '../views/images/logo.png';
			
			$mail->addEmbeddedImage($logoFilePath, 'logo_cid', 'your_logo.png');


			$mail->Body    = $email_template;
                                
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
				$mail->send();
			echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}

?>