<?php
require_once "connection.php";

class ModelPublic{

public static function mdlShowPublic(){
        
        $accID = $_COOKIE["acc_id"];
        $stmt = (new Connection)->connect()->prepare("SELECT * FROM account WHERE AccountID = :AccountID");
        $stmt->bindParam(":AccountID", $accID, PDO::PARAM_STR);
		$stmt -> execute();
        return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
        // setcookie("church_name", $church_ID, time() + (86400 * 30), "/"); // 86400 = 1 day
    }



    public static function mdlUpdatePublic($data){	

        $db = new Connection();
        $pdo = $db->connect();
        $publicID = $_COOKIE["acc_id"];
        
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

            
            $stmt = $pdo->prepare("UPDATE account SET acc_username = :acc_username, acc_password = :acc_password, acc_email = :acc_email, fname = :fname, lname = :lname, religion = :religion, acc_contact = :acc_contact  WHERE AccountID = :AccountID" );

            // $stmt = $pdo->prepare("INSERT INTO register (AccountID,acc_username,acc_password,acc_email,acc_type,fname,lname,designation,acc_contact,religion,verify_token,created_at) 
            // VALUES (:AccountID,:acc_username,:acc_password,:acc_email,:acc_type,:fname,:lname,:designation,:acc_contact,:religion,:verify_token,:created_at)");

            $stmt->bindParam(":acc_username", $data["public_username"]);

            $stmt->bindParam(":acc_password", $data["public_password"]);

            $stmt->bindParam(":acc_email", $data["public_email"]);

            $stmt->bindParam(":fname", $data["public_fname"]);
            
            $stmt->bindParam(":lname", $data["public_lname"]);

            $stmt->bindParam(":religion", $data["public_religion"]);

            $stmt->bindParam(":acc_contact", $data["public_contact"]);

            $stmt->bindParam(":AccountID", $publicID);
        
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

    public static function mdlShowAffiliatedChurches(){	

        $accID = $_COOKIE["acc_id"];
        $status = 1;

        $stmt = (new Connection)->connect()->prepare("SELECT * FROM membership WHERE memberID = :memberID AND membership_status = :membership_status");
        $stmt->bindParam(":memberID", $accID, PDO::PARAM_STR);
        $stmt->bindParam(":membership_status", $status, PDO::PARAM_INT);
		$stmt -> execute();
        return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
        // setcookie("church_name", $church_ID, time() + (86400 * 30), "/"); // 86400 = 1 day


    }

    
    public static function mdlShowEventDetails(){	

        $church_id = $_COOKIE["church_id"];
        $date = $_COOKIE["viewDate"];

        $stmt = (new Connection)->connect()->prepare("SELECT * FROM calendar WHERE churchID = :churchID AND event_date = :event_date");
        $stmt->bindParam(":churchID", $church_id, PDO::PARAM_STR);
        $stmt->bindParam(":event_date", $date, PDO::PARAM_STR);
		$stmt -> execute();
        return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
        // setcookie("church_name", $church_ID, time() + (86400 * 30), "/"); // 86400 = 1 day


    }

    public static function mdlCheckIfInGroup($eventID){	


        $stmt = (new Connection)->connect()->prepare("SELECT * FROM calendargroup WHERE eventID = :eventID");
        $stmt->bindParam(":eventID", $eventID, PDO::PARAM_STR);
		$stmt -> execute();
        return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
        // setcookie("church_name", $church_ID, time() + (86400 * 30), "/"); // 86400 = 1 day


    }



        
    public static function mdlGetChurchDetails(){	

        $church_id = $_COOKIE["church_id"];

        $stmt = (new Connection)->connect()->prepare("SELECT * FROM churches WHERE churchID = :churchID");
        $stmt->bindParam(":churchID", $church_id, PDO::PARAM_STR);
		$stmt -> execute();
        return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
        // setcookie("church_name", $church_ID, time() + (86400 * 30), "/"); // 86400 = 1 day


    }

          
    public static function mdlGetDonation(){	

        $church_id = $_COOKIE["church_id"];

        $stmt = (new Connection)->connect()->prepare("SELECT * FROM donation WHERE chID = :chID");
        $stmt->bindParam(":chID", $church_id, PDO::PARAM_STR);
		$stmt -> execute();
        return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
        // setcookie("church_name", $church_ID, time() + (86400 * 30), "/"); // 86400 = 1 day


    }

    public static function mdlCheckMembership(){	

        $church_id = $_COOKIE["church_id"];
        $accID = $_COOKIE["acc_id"];

        $stmt = (new Connection)->connect()->prepare("SELECT * FROM membership WHERE memChurchID = :memChurchID AND memberID = :memberID");
        $stmt->bindParam(":memChurchID", $church_id, PDO::PARAM_STR);
        $stmt->bindParam(":memberID", $accID, PDO::PARAM_STR);
		$stmt -> execute();
        return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;	
        // setcookie("church_name", $church_ID, time() + (86400 * 30), "/"); // 86400 = 1 day


    }



    
        

    

}


