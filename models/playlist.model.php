<?php
require_once "connection.php";

class ModelPlaylist{

    

    public static function mdlShowPlaylist(){
        
        $newAccID = $_COOKIE["acc_id"];
        $stmt = (new Connection)->connect()->prepare("SELECT * FROM playlist WHERE accID = :accID");
        $stmt->bindParam(":accID", $newAccID, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
	
    }

    
    public static function mdlAddPlaylist($data){	
		$db = new Connection();
        $pdo = $db->connect();
        $newAccID = $_COOKIE["acc_id"];
        
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

			
			$stmt = $pdo->prepare("INSERT INTO playlist (accID, playlist_name) 
            VALUES (:accID, :playlist_name)");

			// $stmt = $pdo->prepare("INSERT INTO register (AccountID,acc_username,acc_password,acc_email,acc_type,fname,lname,designation,acc_contact,religion,verify_token,created_at) 
            // VALUES (:AccountID,:acc_username,:acc_password,:acc_email,:acc_type,:fname,:lname,:designation,:acc_contact,:religion,:verify_token,:created_at)");

			$stmt->bindParam(":accID", $newAccID, PDO::PARAM_STR);
			$stmt->bindParam(":playlist_name", $data["playlist_name"], PDO::PARAM_STR);
	

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


    public static function mdlShowPlaylistDelete($newAccID) {
        $stmt = (new Connection)->connect()->prepare("DELETE FROM playlist WHERE accID = :accID");
        $stmt->bindParam(":accID", $newAccID, PDO::PARAM_INT);
        $stmt->execute();
        
        // Optionally, you can perform additional operations or error handling here.
        // ...
    }


    
}