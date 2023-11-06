<?php
require_once "connection.php";

class ModelChurchSetting{



public static function mdlShowDonation(){
	
	$NewchID = $_COOKIE["church_id"];
	$stmt = (new Connection)->connect()->prepare("SELECT * FROM donation WHERE chID = :chID");
	$stmt->bindParam(":chID", $NewchID, PDO::PARAM_STR);
	$stmt -> execute();
	return $stmt -> fetchAll();
	$stmt -> close();
	$stmt = null;	
	// setcookie("church_name", $church_ID, time() + (86400 * 30), "/"); // 86400 = 1 day


}

public static function mdlDeleteDonation() {
    $NewchID = $_POST["id"]; // Assuming the id is sent through the POST data
    $stmt = (new Connection)->connect()->prepare("DELETE FROM donation WHERE id = :id");
    $stmt->bindParam(":id", $NewchID, PDO::PARAM_INT); // Assuming id is an integer
    $result = $stmt->execute(); // Execute the delete query

    if ($result) {
        // Return true if the deletion was successful
        return true;
    } else {
        // Return false if the deletion failed
        return false;
    }
}

public static function mdlDeleteSocial() {
    $NewchID = $_POST["id"]; // Assuming the id is sent through the POST data
    $stmt = (new Connection)->connect()->prepare("DELETE FROM socialmedia WHERE id = :id");
    $stmt->bindParam(":id", $NewchID, PDO::PARAM_INT); // Assuming id is an integer
    $result = $stmt->execute(); // Execute the delete query

    if ($result) {
        // Return true if the deletion was successful
        return true;
    } else {
        // Return false if the deletion failed
        return false;
    }
}




	public static function mdlAddDonation($data){	
		$db = new Connection();
        $pdo = $db->connect();
        $accID = $_COOKIE["church_id"];
        
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


	public static function mdlShowSocialMedia(){
		$chID = $_COOKIE["church_id"];
		$stmt = (new Connection)->connect()->prepare("SELECT * FROM socialmedia WHERE churchID = :churchID");
		$stmt->bindParam(":churchID", $chID, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
		// setcookie("church_name", $church_ID, time() + (86400 * 30), "/"); // 86400 = 1 day
	
	
	}
	

	public static function mdlSocialMedia($data){	
		$db = new Connection();
        $pdo = $db->connect();
        $chID = $_COOKIE["church_id"];
        
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

			
			$stmt = $pdo->prepare("INSERT INTO socialmedia (churchID, socialMedia, socialmedia_category) 
            VALUES (:churchID , :socialMedia, :socialmedia_category)");

			// $stmt = $pdo->prepare("INSERT INTO register (AccountID,acc_username,acc_password,acc_email,acc_type,fname,lname,designation,acc_contact,religion,verify_token,created_at) 
            // VALUES (:AccountID,:acc_username,:acc_password,:acc_email,:acc_type,:fname,:lname,:designation,:acc_contact,:religion,:verify_token,:created_at)");

			$stmt->bindParam(":churchID", $chID, PDO::PARAM_STR);
			$stmt->bindParam(":socialMedia", $data["socialMedia"], PDO::PARAM_STR);
			$stmt->bindParam(":socialmedia_category", $data["socialMedia_category"], PDO::PARAM_STR);

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

			
			$stmt = $pdo->prepare("UPDATE churches SET church_name = :church_name, church_region = :church_region, church_province = :church_province, church_barangay = :church_barangay, church_street = :church_street,
			
			 church_email = :church_email, church_city = :church_city, religion = :religion, mission = :mission, vision = :vision, church_num = :church_num  WHERE churchID = :churchID" );

			// $stmt = $pdo->prepare("INSERT INTO register (AccountID,acc_username,acc_password,acc_email,acc_type,fname,lname,designation,acc_contact,religion,verify_token,created_at) 
			// VALUES (:AccountID,:acc_username,:acc_password,:acc_email,:acc_type,:fname,:lname,:designation,:acc_contact,:religion,:verify_token,:created_at)");

			$stmt->bindParam(":church_name", $data["Newchurch_name"]);

			$stmt->bindParam(":church_region", $data["Newregion"]);

			$stmt->bindParam(":church_province", $data["Newprovince"]);
			$stmt->bindParam(":church_barangay", $data["Newbarangay"]);

			$stmt->bindParam(":church_street", $data["Newstreet"]);



			$stmt->bindParam(":church_email", $data["Newemail"]);

			$stmt->bindParam(":church_city", $data["Newcity"]);

			$stmt->bindParam(":religion", $data["Newreligion"]);

			$stmt->bindParam(":mission", $data["Newmission"]);
			
			$stmt->bindParam(":vision", $data["Newvision"]);

			$stmt->bindParam(":church_num", $data["Newchurchnum"]);
			


			$stmt->bindParam(":churchID", $churchID);
		
			$stmt->execute();



			$stmt2 = $pdo->prepare("UPDATE account SET acc_username = :acc_username, acc_contact = :acc_contact, fname = :fname, lname = :lname, designation = :designation, acc_password = :acc_password, acc_email = :acc_email, religion = :religion WHERE AccountID = :AccountID" );
			// $stmt = $pdo->prepare("INSERT INTO register (AccountID,acc_username,acc_password,acc_email,acc_type,fname,lname,designation,acc_contact,religion,verify_token,created_at) 
			// VALUES (:AccountID,:acc_username,:acc_password,:acc_email,:acc_type,:fname,:lname,:designation,:acc_contact,:religion,:verify_token,:created_at)");

			$stmt2->bindParam(":acc_username", $data["Newusername"]);

			$stmt2->bindParam(":acc_contact", $data["Newcontact"]);

			$stmt2->bindParam(":fname", $data["Newfname"]);

			$stmt2->bindParam(":lname", $data["Newlname"]);

			$stmt2->bindParam(":designation", $data["Newdesignation"]);

			$stmt2->bindParam(":acc_password", $data["Newpassword"]);

			$stmt2->bindParam(":acc_email", $data["Newemail"]);
			
			$stmt2->bindParam(":religion", $data["Newreligion"]);

	




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

