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

    
}