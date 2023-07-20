<?php
require_once "connection.php";

class ModelChurchSetting{



public static function mdlShowDonation(){
	
	$NewchID = $_COOKIE["acc_id"];
	$stmt = (new Connection)->connect()->prepare("SELECT * FROM donation WHERE chID = :chID");
	$stmt->bindParam(":chID", $NewchID, PDO::PARAM_STR);
	$stmt -> execute();
	return $stmt -> fetchAll();
	$stmt -> close();
	$stmt = null;	
	// setcookie("church_name", $church_ID, time() + (86400 * 30), "/"); // 86400 = 1 day


}


	public static function mdlAddDonation($data){	
		$db = new Connection();
        $pdo = $db->connect();
        $accID = $_COOKIE["acc_id"];
        
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

			
			$stmt = $pdo->prepare("INSERT INTO donation (chID, donation_number, donation_category) 
            VALUES (:chID , :donation_number, :donation_category)");

			// $stmt = $pdo->prepare("INSERT INTO register (AccountID,acc_username,acc_password,acc_email,acc_type,fname,lname,designation,acc_contact,religion,verify_token,created_at) 
            // VALUES (:AccountID,:acc_username,:acc_password,:acc_email,:acc_type,:fname,:lname,:designation,:acc_contact,:religion,:verify_token,:created_at)");

			$stmt->bindParam(":chID", $accID, PDO::PARAM_STR);
			$stmt->bindParam(":donation_number", $data["donation_number"], PDO::PARAM_STR);
            $stmt->bindParam(":donation_category", $data["donation_category"], PDO::PARAM_STR);


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
	public static function mdlAddChurchImages($data) {
		$db = new Connection();
		$pdo = $db->connect();
        $profileID = $_COOKIE["church_id"];

	
		try {
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();
	
			$stmt = $pdo->prepare("UPDATE INTO churches (churchID, avatar) VALUES (:churchID, :avatar)");
			
			// $avatar = file_get_contents($_FILES['userAvatarFile']['tmp_name']);
			// $background = file_get_contents($_FILES['userBackFile']['tmp_name']);

			$stmt->bindParam(":churchID",  $profileID  , PDO::PARAM_STR);
			$stmt->bindParam(":avatar", $data['userAvatarFile'], PDO::PARAM_STR);
			// $stmt->bindParam(":background", $background, PDO::PARAM_STR);
	
			$stmt->execute();
			$pdo->commit();
	
			return "ok";
		} catch (PDOException $e) {
			$pdo->rollBack();
			return "error: " . $e->getMessage();
		} finally {
			$pdo = null;
			$stmt = null;
		}
	}


	public static function mdlUpdatehurch($data){	

 
			$db = new Connection();
			$pdo = $db->connect();
			$churchID = $_COOKIE["church_id"];
			$accountID = $_COOKIE["acc_id"];
			
			try{
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo->beginTransaction();

				
				$stmt = $pdo->prepare("UPDATE churches SET church_name = :church_name, church_address = :church_address, church_email = :church_email WHERE churchID = :churchID" );

				// $stmt = $pdo->prepare("INSERT INTO register (AccountID,acc_username,acc_password,acc_email,acc_type,fname,lname,designation,acc_contact,religion,verify_token,created_at) 
				// VALUES (:AccountID,:acc_username,:acc_password,:acc_email,:acc_type,:fname,:lname,:designation,:acc_contact,:religion,:verify_token,:created_at)");

				$stmt->bindParam(":church_name", $data["Newchurch_name"]);

				$stmt->bindParam(":church_address", $data["Newchurch_address"]);

				$stmt->bindParam(":churchID", $churchID);
			
				$stmt->execute();



				$stmt2 = $pdo->prepare("UPDATE account SET acc_username = :acc_username, acc_contact = :acc_contact, fname = :fname, lname = :lname, designation = :designation, acc_password = :acc_password WHERE AccountID = :AccountID" );
				// $stmt = $pdo->prepare("INSERT INTO register (AccountID,acc_username,acc_password,acc_email,acc_type,fname,lname,designation,acc_contact,religion,verify_token,created_at) 
				// VALUES (:AccountID,:acc_username,:acc_password,:acc_email,:acc_type,:fname,:lname,:designation,:acc_contact,:religion,:verify_token,:created_at)");

				$stmt2->bindParam(":acc_username", $data["Newusername"]);

				$stmt2->bindParam(":acc_contact", $data["Newcontact"]);

				$stmt2->bindParam(":fname", $data["Newfname"]);

				$stmt2->bindParam(":lname", $data["Newlname"]);

				$stmt2->bindParam(":designation", $data["Newdesignation"]);

				$stmt2->bindParam(":acc_password", $data["Newpassword"]);


	

				$stmt2->bindParam(":AccountID", $accountID);
			
				$stmt2->execute();
			
			
			

		    $pdo->commit();
			
		    return "ok";
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
		$pdo = null;	
		$stmt = null;


    }

    
}

