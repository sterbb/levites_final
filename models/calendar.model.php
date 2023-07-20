<?php
require_once "connection.php";

require '../extensions/PHPMailer/src/Exception.php';
require '../extensions/PHPMailer/src/PHPMailer.php';
require '../extensions/PHPMailer/src/SMTP.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//himuan isa ka php


class ModelCalendar{

    public static function mdlAddEvent($data){	
		$db = new Connection();
        $pdo = $db->connect();
        $accID = $_COOKIE["acc_id"];
        $churchID = $_COOKIE["church_id"];
        


        
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

            $current_year = substr(date('Y'), -2 );
			$current_month = date('n');

            
			$event_id = (new Connection)->connect()->prepare("SELECT CONCAT('CE', LPAD((count(id)+1),4,'0'), '$current_month','$current_year') as event_id  FROM calendar FOR UPDATE");
			$event_id->execute();
			$eventID = $event_id -> fetchAll(PDO::FETCH_ASSOC);
			

			
			$stmt = $pdo->prepare("INSERT INTO calendar (churchID, eventID, event_title, event_category, event_date, event_time, event_venue, event_location, event_announcement)
            VALUES (:churchID, :eventID, :event_title, :event_category, :event_date, :event_time, :event_venue, :event_location, :event_announcement)");

			// $stmt = $pdo->prepare("INSERT INTO register (AccountID,acc_username,acc_password,acc_email,acc_type,fname,lname,designation,acc_contact,religion,verify_token,created_at) 
            // VALUES (:AccountID,:acc_username,:acc_password,:acc_email,:acc_type,:fname,:lname,:designation,:acc_contact,:religion,:verify_token,:created_at)");

			$stmt->bindParam(":churchID", $churchID, PDO::PARAM_STR);
			$stmt->bindParam(":eventID", $eventID[0]['event_id'], PDO::PARAM_STR);
			$stmt->bindParam(":event_title", $data["event_title"], PDO::PARAM_STR);
			$stmt->bindParam(":event_category", $data["event_type"], PDO::PARAM_STR);
			$stmt->bindParam(":event_date", $data["event_date"], PDO::PARAM_STR);
			$stmt->bindParam(":event_time", $data["event_time"], PDO::PARAM_STR);
			$stmt->bindParam(":event_venue", $data["event_venue"], PDO::PARAM_STR);
			$stmt->bindParam(":event_location", $data["event_location"], PDO::PARAM_STR);
			$stmt->bindParam(":event_announcement", $data["event_announcement"], PDO::PARAM_STR);


			$stmt->execute();		
		    $pdo->commit();

			echo  $eventID[0]['event_id'];
			
		    return "ok";
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
		$pdo = null;	
		$stmt = null;

    }

	public static function mdlAddGroup($data){	
		$db = new Connection();
        $pdo = $db->connect();

        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

			//GROUP ID
            $current_year = substr(date('Y'), -2 );
			$current_month = date('n');
            
			$group_id = (new Connection)->connect()->prepare("SELECT CONCAT('G', LPAD((count(id)+1),4,'0'), '$current_month','$current_year') as group_id  FROM calendargroup FOR UPDATE");
			$group_id->execute();
			$groupid = $group_id -> fetchAll(PDO::FETCH_ASSOC);
			

			
			$stmt = $pdo->prepare("INSERT INTO calendargroup (eventID, group_name, memberList, emailList, groupID)
            VALUES (:eventID, :group_name, :memberList, :emailList, :groupID)");

			$stmt->bindParam(":eventID", $data["eventID"], PDO::PARAM_STR);
			$stmt->bindParam(":groupID", $groupid[0]['group_id'], PDO::PARAM_STR);
			$stmt->bindParam(":group_name", $data["group_name"], PDO::PARAM_STR);
			$stmt->bindParam(":memberList", $data["group_members"], PDO::PARAM_STR);
			$stmt->bindParam(":emailList", $data["members_email"], PDO::PARAM_STR);


			$stmt->execute();		
		    $pdo->commit();

			


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
						max-width: 600px;
						margin: 0 auto;
						padding: 20px;
						background-color: #f8f8f8;
						border-radius: 5px;
					}
					
					.logo {
						text-align: center;
						margin-bottom: 20px;
					}
					
					.logo img {
						max-width: 200px;
					}
					
					.message {
						margin-bottom: 20px;
					}
					
					.verification-code {
						margin: 0;
						text-align: center;
						margin-bottom: 20px;
						background-color: white;
						font-size: 32px;
						font-weight: bold;
						color: rgb(192, 128, 249);
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
					<div class="logo">
						<img src="../views/images/try.png" alt="Logo">
					</div>
					<div class="message">
						<p>Welcome to Levites! Please verify your email address by entering the verification code below:</p>
					</div>
					<div class="verification-code">YOu are assigned to: '.$data['event_title'].'</div>
					<div class="social-media-container">
						<a class="social-media-link" href="https://www.facebook.com">
							<img class="social-media-icon" src="facebook_icon.png" alt="Facebook">
						</a>
						<a class="social-media-link" href="https://www.twitter.com">
							<img class="social-media-icon" src="twitter_icon.png" alt="Twitter">
						</a>
						<a class="social-media-link" href="https://www.instagram.com">
							<img class="social-media-icon" src="instagram_icon.png" alt="Instagram">
						</a>
					</div>
				</div>

				<div class="verification-code">YOu are assigned to: '.$data['event_time'].'</div>
				<div class="verification-code">YOu are assigned to: '.$data['event_date'].'</div>
				<div class="verification-code">YOu are assigned to: '.$data['event_venue'].'</div>
				<div class="verification-code">YOu are assigned to: '.$data['event_location'].'</div>

			</body>
			</html>
		';	
					
        $mail->Body = $email_template;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
				$mail->send();
			echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
			
		    return "ok";
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
		$pdo = null;	
		$stmt = null;

    }

	public static function mdlShowEvents($data){
        
		$churchID = $_COOKIE["church_id"];

        $stmt = (new Connection)->connect()->prepare("SELECT * FROM calendar WHERE churchID = :churchID AND event_date = :event_date  AND event_category = :event_category");
        $stmt->bindParam(":churchID", $churchID, PDO::PARAM_STR);
		$stmt->bindParam(":event_date", $data['event_date'], PDO::PARAM_STR);
		$stmt->bindParam(":event_category", $data['eventType'], PDO::PARAM_STR);
		$stmt -> execute();
        $events= $stmt -> fetchAll();





		$html = '';

	

		foreach ($events as $event) {


			$stmt2 = (new Connection)->connect()->prepare("SELECT * FROM calendargroup WHERE eventID = :eventID");
			$stmt2->bindParam(":eventID", $event['eventID'], PDO::PARAM_STR);
			$stmt2 -> execute();
			$groups = $stmt2 -> fetchAll();

			$html2 = '';
			foreach($groups as $group){
				$html2.='
				<div class="col">
					<div class="card mb-0">
					<div class="card-body border-bottom d-flex justify-content-between align-items-center">
						<h5 class="card-title inline">'.$group['group_name'].'</h5>
						<button class="font-18  btn btn-outline-success px-3 inline" id="'.$group['group_name'].'" onclick="sendGroupEmail(this)">	<i class="fadeIn animated bx bx-mail-send"></i></button>
					</div>
					<ul class="list-group list-group-flush">
					';

				$members = json_decode($group['memberList']);
				$emails = json_decode($group['emailList']);

				for ($i = 0; $i < count($members); $i++) {
					$member = $members[$i];
					$email = $emails[$i];
					$html2 .= '<li class="list-group-item '.$group['group_name'].'-items " email="' . $email . '" event_title="'.$event['event_title'] .'" event_date="'.$event['event_date'] .'" event_time="'.$event['event_time'] .'" >' . $member . '</li>';
				}

				$html2 .= '
						</ul>
					</div>
				</div>
				';
			}





			$html .= '

			<div class="border border-secondary p-3 mb-5">
                                      
			<div class="row">
			  <div class="col d-flex justify-content-start">
				<div class="dropdown">
				  <button class="btn btn-outline-dark me-4 dropdown-toggle"  style="font-size:1.2em;" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fadeIn animated bx bx-music"></i></button>
				  <ul class="dropdown-menu">
					<li><a class="dropdown-item" href="#">Broken Vessels</a>
					</li>
					<li><a class="dropdown-item" href="#">Raise a Hallelujah</a>
					</li>
					<li><a class="dropdown-item" href="lyrics">Living Hope</a>
					</li>
				  </ul>
				</div>
				<div class="dropdown">
				  <button class="btn btn-outline-dark me-4 dropdown-toggle"  style="font-size:1.2em;" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fadeIn animated bx bx-file"></i></button>
				  <ul class="dropdown-menu">
					<li><a class="dropdown-item" href="#">Chords Chart</a>
					</li>
				  </ul>
				</div>
			  </div>


			  <div class="col d-flex justify-content-end">
				<button class="btn btn-outline-success me-4" style="font-size:1.2em;"><i class="fadeIn animated bx bx-calendar-edit"></i></button>
				<button class="btn btn-outline-danger"><i class="fadeIn animated bx bx-calendar-minus"></i> </button>
			  </div>

			</div>

			
		  
			<div class="row g-3">
			  <div class="col-12 col-lg-12 text-center ">
				<h4 class="mb-2 ">' . $event['event_title'] . '</h4>
			  </div>
			</div>

			<div class="row g-3 mt-2 mb-2">
			  <div class="col-12 col-lg-12 ">
				<h6 class="mb-2 ">When: '.$event['event_date'] .' @'.$event['event_time'] .' - 11:30am</h6>
			  </div>

			  <div class="col-12 col-lg-12 ">
				<h6 class="">Where:  '.$event['event_venue'] .' -  '.$event['event_location'] .'</h6>
			  </div>

			  <div class="col-12 col-lg-12 mb-3">
				<h6 class="mb-2 ">Announcement</h6>
				<textarea class="form-control p-3" id="exampleFormControlTextarea1" rows="5" readonly>
'.$event['event_announcement'] .'
				</textarea>

			  </div>

			</div>

			<h6 >Groups</h6>

			<div class="row row-cols-1 row-cols-lg-3 g-3">';

			$html .= $html2;
			
			$html .='
			</div>
		  </div>
			';

		}

		echo $html;

	

		$stmt = null;	
        // setcookie("church_name", $church_ID, time() + (86400 * 30), "/"); // 86400 = 1 day

	
    }

}