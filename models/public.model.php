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

        

    

}


