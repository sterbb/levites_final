<?php
require_once "connection.php";

class ModelUserAccount{

    
    
    public static function mdlAddUserAccount($data){	
		$db = new Connection();
        $pdo = $db->connect();
        $account_type= "User";

        
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

			
			$stmt = $pdo->prepare("INSERT INTO account (acc_username, acc_password, acc_type) 
            VALUES (:acc_username, :acc_password, :acc_type)");


            // $stmt = $pdo->prepare("INSERT INTO account (acc_username, acc_password, acc_type) 
            // VALUES (:acc_username, :acc_password, :acc_type)");

		
			$stmt->bindParam(":acc_username", $data["user-name"], PDO::PARAM_STR);
            $stmt->bindParam(":acc_password", $data["user-password"], PDO::PARAM_STR);
            $stmt->bindParam(":acc_type",  $account_type, PDO::PARAM_STR);
				

	

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