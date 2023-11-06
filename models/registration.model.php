<?php 

require_once "connection.php";

require '../extensions/PHPMailer/src/Exception.php';
require '../extensions/PHPMailer/src/PHPMailer.php';
require '../extensions/PHPMailer/src/SMTP.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ModelRegister {

	static public function mdlRegisterPublicAccount($data){

		
		$db = new Connection();
        $pdo = $db->connect();

		$verify_token = substr(md5(rand()), 0,5);
		$account_type= "public";


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
			// $mail->addAddress('uvuvwefor1@gmail.com', 'Joe User');     //Add a recipient
			$mail->addAddress($data['user_email'], $data['user_fname'] . $data['user_lname'] );   
			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Levites Registration Confirmation';
			
			
			// Email Template
			$email_template = '
			<html>
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
			
			.logo {
				text-align: center;
				margin-bottom: 10px;
				margin-left: 55px;
			}
			
			.logo img {
				text-align: center;
				max-width: 250px;
			}
			
			.message {
				margin-bottom: 20px;
				text-align: center;
				color: #E1E1E8;

			}
			
			.verification-code {
				margin: 0;
				border-radius: 5px;
				text-align: center;
				margin-bottom: 20px;
				background-color: #E1E1E8;
				font-size: 32px;
				font-weight: bold;
				color: #e3aafb;
			}
			
			.social-media-container {
				text-align: center;
				margin-top: 20px;
			}
			
			.social-media-link {
				display: inline-block;
				margin-right: 10px;
				text-decoration: none;
			}
			
			.social-media-icon {
				width: 30px;
				height: 30px;
			}
			
		</style>
			</head>
			<body>
				<div class="container">
						<a class="logo" href="https://www.levites.net"><img src="cid:logo_cid" alt="Logo"></a>

					<div class="message">
						<p>Welcome to Levites! Please verify your email address by entering the verification code below:</p>
					</div>
					<div class="verification-code">' . $verify_token . '</div>
					<div class="social-media-container">
									<a class="social-media-link" href="https://www.facebook.com/levites.2023">
										<img class="social-media-icon" src="cid:facebook_cid" alt="Facebook">
									</a>
									<a class="social-media-link" href="mailto:jajajoenterprise@gmail.com">
										<img class="social-media-icon" src="cid:gmail_cid" alt="Gmail">
									</a>
									<a class="social-media-link" href="https://youtube.com/@levites2023">
										<img class="social-media-icon" src="cid:youtube_cid" alt="Youtube">
									</a>
									
								</div>
				</div>
			</body>
			</html>
		';	

	
		$logoFilePath = '../views/images/logo.png';
		$facebookIconPath = '../views/images/facebook.png';
		$gmailIconPath = '../views/images/gmail.png';
		$youtubeIconPath = '../views/images/youtube.png';



		$mail->addEmbeddedImage($logoFilePath, 'logo_cid', 'your_logo.png');
		$mail->addEmbeddedImage($facebookIconPath, 'facebook_cid', 'facebook_icon.png');
		$mail->addEmbeddedImage($gmailIconPath, 'gmail_cid', 'gmail_icon.png');
		$mail->addEmbeddedImage($youtubeIconPath, 'youtube_cid', 'youtube_icon.png');


        $mail->Body = $email_template;
        $mail->AltBody = 'Check for verification code';
				$mail->send();
		
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}


        try{

			
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

			$current_year = substr(date('Y'), -2 );
			$current_month = date('n');

			$account_id = (new Connection)->connect()->prepare("SELECT CONCAT('A', LPAD((count(id)+1),4,'0'), '$current_month','$current_year') as account_id  FROM account FOR UPDATE");
			$account_id->execute();
			$accountid = $account_id -> fetchAll(PDO::FETCH_ASSOC);
			
			
			$stmt = $pdo->prepare("INSERT INTO account (AccountID, acc_username, acc_password, acc_email, fname, lname, religion, verify_token, acc_type) 
            VALUES (:AccountID, :acc_username, :acc_password, :acc_email, :fname, :lname, :religion, :verify_token, :acc_type)");

			// $stmt = $pdo->prepare("INSERT INTO register (AccountID,acc_username,acc_password,acc_email,acc_type,fname,lname,designation,acc_contact,religion,verify_token,created_at) 
            // VALUES (:AccountID,:acc_username,:acc_password,:acc_email,:acc_type,:fname,:lname,:designation,:acc_contact,:religion,:verify_token,:created_at)");
			// 	$account_id = (new Connection)->connect()->prepare("SELECT CONCAT('A', LPAD((count(id)+1),4,'0'), '$current_month','$current_year') as account_id  FROM account FOR UPDATE");
			// $account_id->execute();
			// $accountid = $account_id -> fetchAll(PDO::FETCH_ASSOC);
			
			$stmt->bindParam(":AccountID", $accountid[0]['account_id'], PDO::PARAM_STR);
			$stmt->bindParam(":acc_username", $data["user_username"], PDO::PARAM_STR);
			$stmt->bindParam(":acc_password", $data["user_password"], PDO::PARAM_STR);
			$stmt->bindParam(":acc_email", $data["user_email"], PDO::PARAM_STR);

			$stmt->bindParam(":fname", $data["user_fname"], PDO::PARAM_STR);
			$stmt->bindParam(":lname", $data["user_lname"], PDO::PARAM_STR);
			$stmt->bindParam(":religion", $data["user_religion"], PDO::PARAM_STR);

			
			$stmt->bindParam(":verify_token", $verify_token, PDO::PARAM_STR);
			$stmt->bindParam(":acc_type", $account_type, PDO::PARAM_STR);
			
			setcookie("current_email", $data["user_email"], time() + (86400 * 30), "/"); // 86400 = 1 day
			setcookie("current_name", $data["user_fname"] . $data["user_lname"], time() + (86400 * 30), "/"); // 86400 = 1 day
			
			$stmt->execute();			





		    $pdo->commit();


			echo $_COOKIE['current_email'];
		    return "ok";
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
		$pdo = null;	
		$stmt = null;

	}

	static public function mdlRegisterChurchAccount($data){

		
		$db = new Connection();
        $pdo = $db->connect();

		$verify_token = substr(md5(rand()), 0,5);
		$account_type= "admin";


		// to church
		$mail2 = new PHPMailer(true);
		try {

		    //Server settings
			// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail2->isSMTP();                                            //Send using SMTP
			$mail2->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
			$mail2->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail2->Username   = 'levites@levites.net';                     //SMTP username islan pa
			$mail2->Password   = 'Levitespass1234!';                               //SMTP password 
			$mail2->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			$mail2->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
			$mail2->setFrom('levites@levites.net', 'Levites');

			$mail2->addAddress($data['church_email'], $data['church_name']);     //Add a recipient

			$mail2->isHTML(true);                                  //Set email format to HTML
			$mail2->Subject = 'Levites Registration Confirmation';
			
			
			// Email Template
			$email_template = '
			<html>
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
			
			.logo {
				text-align: center;
				margin-bottom: 10px;
				margin-left: 55px;
			}
			
			.logo img {
				text-align: center;
				max-width: 250px;
			}
			
			.message {
				margin-bottom: 20px;
				text-align: center;
				color: #E1E1E8;

			}
			
			.verification-code {
				margin: 0;
				border-radius: 5px;
				text-align: center;
				margin-bottom: 20px;
				background-color: #E1E1E8;
				font-size: 32px;
				font-weight: bold;
				color: #e3aafb;
			}
			
			.social-media-container {
				text-align: center;
				margin-top: 20px;
			}
			
			.social-media-link {
				display: inline-block;
				margin-right: 10px;
				text-decoration: none;
			}
			
			.social-media-icon {
				width: 30px;
				height: 30px;
			}
			
		</style>
			</head>
			<body>
				<div class="container">
						<a class="logo" href="https://www.levites.net"><img src="cid:logo_cid" alt="Logo"></a>

					<div class="message">
						<p>Welcome to Levites! Please verify your email address by entering the verification code below:</p>
					</div>
					<div class="verification-code">' . $verify_token . '</div>
					<div class="social-media-container">
									<a class="social-media-link" href="https://www.facebook.com/levites.2023">
										<img class="social-media-icon" src="cid:facebook_cid" alt="Facebook">
									</a>
									<a class="social-media-link" href="mailto:jajajoenterprise@gmail.com">
										<img class="social-media-icon" src="cid:gmail_cid" alt="Gmail">
									</a>
									<a class="social-media-link" href="https://youtube.com/@levites2023">
										<img class="social-media-icon" src="cid:youtube_cid" alt="Youtube">
									</a>
									
								</div>
				</div>
			</body>
			</html>
		';	

	
		$logoFilePath = '../views/images/logo.png';
		$facebookIconPath = '../views/images/facebook.png';
		$gmailIconPath = '../views/images/gmail.png';
		$youtubeIconPath = '../views/images/youtube.png';



		$mail2->addEmbeddedImage($logoFilePath, 'logo_cid', 'your_logo.png');
		$mail2->addEmbeddedImage($facebookIconPath, 'facebook_cid', 'facebook_icon.png');
		$mail2->addEmbeddedImage($gmailIconPath, 'gmail_cid', 'gmail_icon.png');
		$mail2->addEmbeddedImage($youtubeIconPath, 'youtube_cid', 'youtube_icon.png');


        $mail2->Body = $email_template;
        $mail2->AltBody = 'Check for verification code';
				$mail2->send();
			echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail2->ErrorInfo}";
		}


        try{	
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

			$current_year = substr(date('Y'), -2 );
			$current_month = date('n');

			$account_id = (new Connection)->connect()->prepare("SELECT CONCAT('A', LPAD((count(id)+1),4,'0'), '$current_month','$current_year') as account_id  FROM account FOR UPDATE");
			$account_id->execute();
			$accountid = $account_id -> fetchAll(PDO::FETCH_ASSOC);

			$church_id = (new Connection)->connect()->prepare("SELECT CONCAT('C', LPAD((count(id)+1),4,'0'), '$current_month','$current_year') as church_id  FROM churches FOR UPDATE");
			$church_id->execute();
			$churchid = $church_id -> fetchAll(PDO::FETCH_ASSOC);
			

			//add to account database
			$stmt = $pdo->prepare("INSERT INTO account (AccountID, acc_username,acc_password, fname, lname, designation, religion, acc_contact ,acc_email, verify_token, acc_type, affiliated_church, affiliated_churchname) 
            VALUES (:AccountID, :acc_username, :acc_password, :fname, :lname, :designation, :religion, :acc_contact,  :acc_email,  :verify_token, :acc_type, :affiliated_church,  :affiliated_churchname)");

			// $stmt = $pdo->prepare("INSERT INTO register (AccountID,acc_username,acc_password,acc_email,acc_type,fname,lname,designation,acc_contact,religion,verify_token,created_at) 
            // VALUES (:AccountID,:acc_username,:acc_password,:acc_email,:acc_type,:fname,:lname,:designation,:acc_contact,:religion,:verify_token,:created_at)");

			$stmt->bindParam(":AccountID", $accountid[0]['account_id'], PDO::PARAM_STR);

			

			$stmt->bindParam(":fname", $data["church_fname"], PDO::PARAM_STR);
			$stmt->bindParam(":lname", $data["church_lname"], PDO::PARAM_STR);
			$stmt->bindParam(":designation", $data["church_designation"], PDO::PARAM_STR);
			$stmt->bindParam(":religion", $data["church_religion"], PDO::PARAM_STR);
			$stmt->bindParam(":acc_contact", $data["church_telnum"], PDO::PARAM_STR);


			$stmt->bindParam(":acc_username", $data["church_username"], PDO::PARAM_STR);
			$stmt->bindParam(":acc_password", $data["church_password"], PDO::PARAM_STR);
			$stmt->bindParam(":acc_email", $data["church_email"], PDO::PARAM_STR);
			$stmt->bindParam(":verify_token", $verify_token, PDO::PARAM_STR);
			$stmt->bindParam(":acc_type", $account_type, PDO::PARAM_STR);

			$stmt->bindParam(":affiliated_church", $churchid[0]['church_id'], PDO::PARAM_STR);
			$stmt->bindParam(":affiliated_churchname", $data["church_name"], PDO::PARAM_STR);
		
			$stmt->execute();		

			

			
			
			// add to church database
			$stmt2 = $pdo->prepare("INSERT INTO churches (churchID, accID, church_name, church_num, church_city, church_region, church_province, church_barangay, church_street,  religion, church_email) 
            VALUES (:churchID, :accID,  :church_name, :church_num, :church_city,  :church_region, :church_province, :church_barangay, :church_street,  :religion, :church_email)");

			// $stmt = $pdo->prepare("INSERT INTO register (AccountID,acc_username,acc_password,acc_email,acc_type,fname,lname,designation,acc_contact,religion,verify_token,created_at) 
            // VALUES (:AccountID,:acc_username,:acc_password,:acc_email,:acc_type,:fname,:lname,:designation,:acc_contact,:religion,:verify_token,:created_at)");
			

			$stmt2->bindParam(":accID", $accountid[0]['account_id'], PDO::PARAM_STR);

			$stmt2->bindParam(":churchID", $churchid[0]['church_id'], PDO::PARAM_STR);
			$stmt2->bindParam(":church_name", $data["church_name"], PDO::PARAM_STR);
			$stmt2->bindParam(":church_num", $data["church_cotnum"], PDO::PARAM_STR);

			$stmt2->bindParam(":church_city", $data["church_city"], PDO::PARAM_STR);
			$stmt2->bindParam(":church_region", $data["church_region"], PDO::PARAM_STR);
			$stmt2->bindParam(":church_province", $data["church_province"], PDO::PARAM_STR);
			$stmt2->bindParam(":church_barangay", $data["church_barangay"], PDO::PARAM_STR);
			$stmt2->bindParam(":church_street", $data["church_street"], PDO::PARAM_STR);

			$stmt2->bindParam(":religion", $data["church_religion"], PDO::PARAM_STR);

			$stmt2->bindParam(":church_email", $data["church_email"], PDO::PARAM_STR);
			$stmt2->execute();		

			setcookie("current_email", $data["church_email"], time() + (86400 * 30), "/"); // 86400 = 1 day
			setcookie("current_name", $data["church_name"], time() + (86400 * 30), "/"); // 86400 = 1 day
			

		    $pdo->commit();


			
		    return "ok";
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
		$pdo = null;	
		$stmt = null;

	}



    static public function mdlVerifyRegistration($data) {
        $db = new Connection();
        $pdo = $db->connect();
		$success_stat = 1;
        
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

			$stmt = $pdo->prepare("SELECT verify_token FROM account WHERE acc_email = :acc_email LIMIT 1");

            $stmt->bindParam(":acc_email", $_COOKIE['current_email'], PDO::PARAM_STR);

			$stmt->execute();
			$result = $stmt->fetch();
			

			if($result[0] == $data['code']){
				$status = $pdo->prepare("UPDATE account SET verify_status = :verify_status WHERE acc_email = :acc_email ");
				$status->bindParam(":verify_status", $success_stat, PDO::PARAM_INT);
				$status->bindParam(":acc_email", $_COOKIE['current_email'], PDO::PARAM_STR);
				$status->execute();
				$pdo->commit();
				echo "success";	
			}else{
				echo "fail";
			}

	
		    return "ok";
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
		$pdo = null;	
		$stmt = null;


    }

	static public function mdlResendVerification(){
		
		$db = new Connection();
        $pdo = $db->connect();
		

		$verify_token = substr(md5(rand()), 0,5);
		
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

			$mail->addAddress($_COOKIE['current_email'], $_COOKIE['current_name']);     //Add a recipient

			 // Content
			 $mail->isHTML(true); // Set email format to HTML
			 $mail->Subject = 'Levites Registration Confirmation';
			 $email_template = '<b>Welcome to Levites</b>
				 <h1>Accept this request if you have registered! Disregard this message if not.</h1>
				 <h1>'. $verify_token.'</h1> ';
			 $mail->Body = $email_template;
			 $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
				$mail->send();
			echo 'success';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}

		    
        try{
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();
			$status = $pdo->prepare("UPDATE account SET verify_token = :verify_token WHERE acc_email = :acc_email ");
			$status->bindParam(":verify_token", $verify_token, PDO::PARAM_STR);
			$status->bindParam(":acc_email", $_COOKIE['current_email'], PDO::PARAM_STR);
			$status->execute();
			$pdo->commit();
			echo "success";	
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
		$pdo = null;	
		$stmt = null;



	}

    
}





?>
