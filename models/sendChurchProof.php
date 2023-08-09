<?php
require '../extensions/PHPMailer/src/Exception.php';
require '../extensions/PHPMailer/src/PHPMailer.php';
require '../extensions/PHPMailer/src/SMTP.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if($_FILES['church_prof']){
    $file_tmp =   $_FILES['church_prof']['tmp_name'];
    $file_name =    $_FILES['church_prof']['name'];
	$file_tmp2 =   $_FILES['church_pprof']['tmp_name'];
    $file_name2 =    $_FILES['church_pprof']['name'];
	$church_name = $_POST['church_name'];
	$church_address = $_POST['church_address'];
	$church_num = $_POST['church_num'];
	$church_pfname = $_POST['church_pfname'];
	$church_plname = $_POST['church_plname'];
	$church_designation = $_POST['church_designation'];
	$church_pnum = $_POST['church_pnum'];
	
    echo  $file_tmp . $file_tmp2;


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

			$mail->addAddress('levites@levites.net', 'Levites');     //Add a recipient

			
			//Attachments
			// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
			$mail->addAttachment($file_tmp, 'church.jpg');    //Optional name
			$mail->addAttachment($file_tmp2, 'user.jpg');    //Optional name
			// $mail->addAttachment($data['user_proof'], 'user.jpg');    //Optional name

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Church Registration';
			$mail->Body    = '<b>ACCOUNT ID: SAMPLEID</b>

								<h4>Church Name: '.$church_name.' </h4>
								<h4>Church Address: '.$church_address.' </h4>
								<h4>Church Number: '.$church_num.' </h4>

								<h4>Registree Name: '.$church_pfname . ' '. $church_plname.' </h4>
								<h4>Registree Designation: '.$church_designation.' </h4>
								<h4>Registree Number: '.$church_pnum.' </h4>';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
				$mail->send();
			echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}

}

?>