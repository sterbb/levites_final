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

			$currentMon = date("Y-m-d"); 
			

            
			$event_id = (new Connection)->connect()->prepare("SELECT CONCAT('CE', LPAD((count(id)+1),4,'0'), '$current_month','$current_year') as event_id  FROM calendar FOR UPDATE");
			$event_id->execute();
			$eventID = $event_id -> fetchAll(PDO::FETCH_ASSOC);
			

			
			$stmt = $pdo->prepare("INSERT INTO calendar (churchID, eventID, event_title, event_category, event_date, event_time, event_date2, event_time2, event_venue, event_location, event_announcement, current_event)
            VALUES (:churchID, :eventID, :event_title, :event_category, :event_date, :event_time, :event_date2, :event_time2, :event_venue, :event_location, :event_announcement, :current_event)");

			// $stmt = $pdo->prepare("INSERT INTO register (AccountID,acc_username,acc_password,acc_email,acc_type,fname,lname,designation,acc_contact,religion,verify_token,created_at) 
            // VALUES (:AccountID,:acc_username,:acc_password,:acc_email,:acc_type,:fname,:lname,:designation,:acc_contact,:religion,:verify_token,:created_at)");

			$stmt->bindParam(":churchID", $churchID, PDO::PARAM_STR);
			$stmt->bindParam(":eventID", $eventID[0]['event_id'], PDO::PARAM_STR);
			$stmt->bindParam(":event_title", $data["event_title"], PDO::PARAM_STR);
			$stmt->bindParam(":event_category", $data["event_type"], PDO::PARAM_STR);
			$stmt->bindParam(":event_date", $data["event_date1"], PDO::PARAM_STR);
			$stmt->bindParam(":event_time", $data["event_time1"], PDO::PARAM_STR);
			$stmt->bindParam(":event_date2", $data["event_date2"], PDO::PARAM_STR);
			$stmt->bindParam(":event_time2", $data["event_time2"], PDO::PARAM_STR);
			$stmt->bindParam(":event_venue", $data["event_venue"], PDO::PARAM_STR);
			$stmt->bindParam(":event_location", $data["event_location"], PDO::PARAM_STR);
			$stmt->bindParam(":event_announcement", $data["event_announcement"], PDO::PARAM_STR);
			$stmt->bindParam(":current_event", $currentMon, PDO::PARAM_STR);


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

			$emails = json_decode($data["members_email"]);
			$members = json_decode($data["group_members"]);

			$count = count($members);

			for ($i = 0; $i < $count; $i++) {
				
			
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

				// ISLAN PNI kag e loop sa emaillist
				$mail->addAddress($emails[$i], $members[$i]);     //Add a recipient


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

					<div class="verification-code">TIME: '.$data['event_time1'].' - '. $data['event_time2'] .'</div>
					<div class="verification-code">DATE: '.$data['event_date1'].' - '.$data['event_date2'].'</div>
					<div class="verification-code">VENUE: '.$data['event_venue'].'</div>
					<div class="verification-code">LOCATION: '.$data['event_location'].'</div>

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

			}

			
		    return "ok";
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
		$pdo = null;	
		$stmt = null;
		

    }
	public static function mdlAddEventType($data){	
		$db = new Connection();
        $pdo = $db->connect();
        $EventTypeID = $_COOKIE["church_id"];

        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();
			
			
			$stmt = $pdo->prepare("INSERT INTO eventtype (churchID, type_name)
            VALUES (:churchID, :type_name)");

			// $stmt->bindParam(":eventID", $eventID[0]['event_id'], PDO::PARAM_STR);
			$stmt->bindParam(":churchID", $EventTypeID, PDO::PARAM_STR);
			$stmt->bindParam(":type_name", $data["type_name"], PDO::PARAM_STR);


			$stmt->execute();		
		    $pdo->commit();
			
		    return "ok";
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
		$pdo = null;	
		$stmt = null;

    }


	public static function mdlShowEventType(){
        $eventType = $_COOKIE["church_id"];
        $stmt = (new Connection)->connect()->prepare("SELECT * FROM eventtype WHERE churchID = :churchID");
        $stmt->bindParam(":churchID", $eventType, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
	
    }

	public static function mdlCheckFile($data){
    
        $stmt = (new Connection)->connect()->prepare("SELECT * FROM calendar WHERE eventID = :eventID");
        $stmt->bindParam(":eventID", $data['event'], PDO::PARAM_STR);
		$stmt -> execute();	
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;	
	
    }

	

	public static function mdlLinkPlaylist($data){
		$db = new Connection();
        $pdo = $db->connect();

        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();
			

			
			$stmt = $pdo->prepare("UPDATE calendar SET linked_playlist = :linked_playlist WHERE eventID = :eventID ");

			$stmt->bindParam(":eventID", $data["event"], PDO::PARAM_STR);
			$stmt->bindParam(":linked_playlist", $data["playlist"], PDO::PARAM_STR);

			$stmt->execute();		
		    $pdo->commit();
			
		    return "ok";
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
		$pdo = null;	
		$stmt = null;

    }

	public static function mdlLinkFile($data){
		$db = new Connection();
        $pdo = $db->connect();

        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();
			

			
			$stmt = $pdo->prepare("UPDATE calendar SET linked_files = :linked_files WHERE eventID = :eventID ");

			$stmt->bindParam(":eventID", $data["event"], PDO::PARAM_STR);
			$stmt->bindParam(":linked_files", $data["files"], PDO::PARAM_STR);

			$stmt->execute();		
		    $pdo->commit();
			
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

		

        $stmt = (new Connection)->connect()->prepare("SELECT * FROM calendar WHERE churchID = :churchID AND (:event_date BETWEEN event_date AND event_date2) AND event_category = :event_category");
        $stmt->bindParam(":churchID", $churchID, PDO::PARAM_STR);
		$stmt->bindParam(":event_date", $data['event_date'], PDO::PARAM_STR);
		$stmt->bindParam(":event_category", $data['eventType'], PDO::PARAM_STR);
		$stmt -> execute();
        $events= $stmt -> fetchAll();
		
		
		$html = '';

	

		foreach ($events as $event) {

			$songlist;	
			$playlist = (new Connection)->connect()->prepare("SELECT * FROM playlist WHERE playlistID = :playlistID");
			$playlist->bindParam(":playlistID", $event['linked_playlist'], PDO::PARAM_STR);
			$playlist -> execute();
			$songs = $playlist -> fetch();

			if (is_array($songs)) {
				// Check if $songs is an array before trying to access its elements
		
				if (isset($songs['songs'])) {
					$songlist = $songs['songs'];
					// echo "Song ID: " . $songlist . "<br>";
				} else {
					// Handle the case when 'playlist_name' key is not set in $songs
					// echo "Playlist Name is not set.<br>";
				}	
			} else {
				$songlist = '';
			}

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
					$html2 .= '<li class="list-group-item '.$group['group_name'].'-items " email="' . $email . '" event_title="'.$event['event_title'] .'" event_date="'.$event['event_date'] .'" event_time="'.$event['event_time'] .'" event_date2="'.$event['event_date2'] .'" event_time2="'.$event['event_time2'] .'">' . $member . '</li>';
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
				  <button class="btn btn-outline-dark me-4 dropdown-toggle"  style="font-size:1.2em;" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fadeIn animated bx bx-file"></i></button>
				  <ul class="dropdown-menu">';
				  
	
					$jsonData = $event['linked_files'];

					// Convert JSON string to PHP array
					$dataArray = json_decode($jsonData, true);

					// Check if the decoding was successful
					if (is_array($dataArray)) {
						// Iterate over each element in the array using a foreach loop
						foreach ($dataArray as $item) {

							$name = $item['name'];
							$path = $item['path'];

							// Do whatever processing you need with 'name' and 'path'
							$html.= '<li><a class="dropdown-item" value="'.$path.'" onclick="downloadLinkedFile(this)">'.$name.'</a>
							</li>';
						}
					} else {

					}

			$html .= '		
				  </ul>
				</div>
				<div class="dropdown">
				  <button class="btn btn-outline-dark me-4 dropdown-toggle"  style="font-size:1.2em;" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fadeIn animated bx bx-music"></i></button>
				  <ul class="dropdown-menu">';

				  
						$songs_songlist = json_decode($songlist, true);
						if (is_array($songs_songlist)) {
							foreach ($songs_songlist as $song_inlist) {
								$html .= '<li><a class="dropdown-item" value="' . $song_inlist['trackID'] .'" onclick="downloadLinkedSong(this)">' . $song_inlist['title'] .' - ' . $song_inlist['artist'] .'</a>
											</li>';
							}
						}



			$html .='
				  </ul>
				</div>
			  </div>


			  <div class="col d-flex justify-content-end">
				<button class="btn btn-outline-success me-4" eventid="' . $event['eventID'] . '"  onclick="editEventDetails(this)"  style="font-size:1.2em;"><i class="fadeIn animated bx bx-calendar-edit"></i></button>
				<button class="btn btn-outline-danger" id="'.$event['eventID'].'" onclick="deleteEvents(this)" eventID="'.$event['eventID'].'"><i class="fadeIn animated bx bx-calendar-minus"></i> </button>
			  </div>

			</div>

			
		  
			<div class="row g-3">
			  <div class="col-12 col-lg-12 text-center ">
				<h4 class="mb-2 ">' . $event['event_title'] . '</h4>
			  </div>
			</div>

			<div class="row g-3 mt-2 mb-2">
			  <div class="col-12 col-lg-12 ">
				<h6 class="mb-2 ">When: '.$event['event_date'] .' @'.$event['event_time'] .' - '.$event['event_time2'] .'</h6>
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
	
	public static function mdlGetEventDetails($data){

		$stmt = (new Connection)->connect()->prepare("SELECT eventID, event_title, event_category, event_date, event_time, event_time2, event_venue, event_location, event_announcement FROM calendar WHERE eventID = :eventID ");
		$stmt->bindParam(":eventID", $data['event_id'], PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;	
	
	}


	public static function mdlUpdateEvents($data){	

        $db = new Connection();
        $pdo = $db->connect();
		$churchID = $_COOKIE["church_id"];
	
		try{
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();


            
            $stmt = $pdo->prepare("UPDATE calendar SET event_title = :event_title, event_date = :event_date, event_category = :event_category, event_venue = :event_venue, event_location = :event_location, event_announcement = :event_announcement, event_time = :event_time WHERE eventID = :eventID AND churchID = :churchID" );

            // $stmt = $pdo->prepare("INSERT INTO register (AccountID,acc_username,acc_password,acc_email,acc_type,fname,lname,designation,acc_contact,religion,verify_token,created_at) 
            // VALUES (:AccountID,:acc_username,:acc_password,:acc_email,:acc_type,:fname,:lname,:designation,:acc_contact,:religion,:verify_token,:created_at)");

            $stmt->bindParam(":event_title", $data["new_title"]);

			$stmt->bindParam(":event_date", $data["new_date"]);

			$stmt->bindParam(":event_category", $data["new_category"]);

			$stmt->bindParam(":event_venue", $data["new_venue"]);

			$stmt->bindParam(":event_location", $data["new_location"]);
	
			$stmt->bindParam(":event_announcement", $data["new_announcement"]);

			$stmt->bindParam(":event_time", $data["new_eventtime1"]);
	
	

			$stmt->bindParam(":eventID", $data["event_id"]);

			$stmt->bindParam(":churchID", $churchID);

            $stmt->execute();
        
		
		

		$pdo->commit();
		
			return "ok";
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
		$pdo = null;	
		$stmt = null;
	}



	public static function mdlDeleteEvents($data) {

        $stmt = (new Connection)->connect()->prepare("DELETE FROM calendar WHERE eventID = :eventID");
        $stmt->bindParam(":eventID", $data['eventID'], PDO::PARAM_STR);
        $stmt->execute();
        
   
    }



}
