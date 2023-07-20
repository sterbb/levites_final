<?php
require_once "connection.php";

class ModelWebsite{



	
    public static function mdlDeleteWebsite(){

		if (isset($_POST['itemId'])) {
			// Sanitize the input and retrieve the item ID
			$itemId = filter_var($_POST['itemId'], FILTER_SANITIZE_NUMBER_INT);
		


			$stmt = (new Connection)->connect()->prepare("DELETE * FROM websites WHERE id = :id");
			$stmt->bindParam(":id",  $itemId , PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetchAll();
			$stmt -> close();
			$stmt = null;	
		}
    }

    

    public static function mdlShowWebsites(){
        
        
        $accID = $_COOKIE["acc_id"];
        $stmt = (new Connection)->connect()->prepare("SELECT * FROM websites WHERE accountID = :accountID");
        $stmt->bindParam(":accountID", $accID, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
	
    }

	public static function mdlShowGroups(){
        
        
        $accID = $_COOKIE["acc_id"];
        $stmt = (new Connection)->connect()->prepare("SELECT * FROM websitegroups WHERE accID = :accID");
        $stmt->bindParam(":accID", $accID, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
	
    }

    public static function mdlAddWebsite($data){	
		$db = new Connection();
        $pdo = $db->connect();
        $accID = $_COOKIE["acc_id"];
        
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

			
			$stmt = $pdo->prepare("INSERT INTO websites (accountID,website_name,website_path, website_category) 
            VALUES (:accountID,:website_name, :website_path, :website_category)");

			// $stmt = $pdo->prepare("INSERT INTO register (AccountID,acc_username,acc_password,acc_email,acc_type,fname,lname,designation,acc_contact,religion,verify_token,created_at) 
            // VALUES (:AccountID,:acc_username,:acc_password,:acc_email,:acc_type,:fname,:lname,:designation,:acc_contact,:religion,:verify_token,:created_at)");

			$stmt->bindParam(":accountID", $accID, PDO::PARAM_STR);
			$stmt->bindParam(":website_name", $data["website_name"], PDO::PARAM_STR);
			$stmt->bindParam(":website_path", $data["website_path"], PDO::PARAM_STR);
			$stmt->bindParam(":website_category", $data["website_category"], PDO::PARAM_STR);


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

    
    public static function mdlAddGroup($data){	
		$db = new Connection();
        $pdo = $db->connect();
        $accID = $_COOKIE["acc_id"];
        
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

			
			$stmt = $pdo->prepare("INSERT INTO websitegroups (accID, group_name, websites_list) 
            VALUES (:accID, :group_name, :websites_list)");

			// $stmt = $pdo->prepare("INSERT INTO register (AccountID,acc_username,acc_password,acc_email,acc_type,fname,lname,designation,acc_contact,religion,verify_token,created_at) 
            // VALUES (:AccountID,:acc_username,:acc_password,:acc_email,:acc_type,:fname,:lname,:designation,:acc_contact,:religion,:verify_token,:created_at)");

			$stmt->bindParam(":accID", $accID, PDO::PARAM_STR);
			$stmt->bindParam(":group_name", $data["website_groupname"], PDO::PARAM_STR);
			$stmt->bindParam(":websites_list", $data["website_list"], PDO::PARAM_STR);

			$stmt->execute();		


			$websiteList = json_decode($data["website_list"]);

			//attendees
			foreach($websiteList as $website){
				$website_group = $pdo->prepare("UPDATE websites SET group_name = :group_name WHERE accountID = :accountID AND website_name = :website_name");
			
				$website_group -> bindParam(":accountID", $accID, PDO::PARAM_STR);
				$website_group -> bindParam(":group_name", $data["website_groupname"], PDO::PARAM_STR);
				$website_group -> bindParam(":website_name", $website -> name, PDO::PARAM_STR);
				$website_group->execute();

			}
			
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