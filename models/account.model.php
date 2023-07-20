<?php
require_once "connection.php";

class ModelUserAccount{

    
    
    public static function mdlAddUserAccount($data){	
		$db = new Connection();
        $pdo = $db->connect();

		$verify_status = 1;

        $church_id = $_COOKIE['church_id'];
		$church_name = $_COOKIE['church_name'];
		$acc_type = 'subuser';
		$user_name = 'Subuser-' + $church_id;
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

			$current_year = substr(date('Y'), -2 );
			$current_month = date('n');

			$account_id = (new Connection)->connect()->prepare("SELECT CONCAT('SU', LPAD((count(id)+1),4,'0'), '$current_month','$current_year') as account_id  FROM account FOR UPDATE");
			$account_id->execute();
			$accountid = $account_id -> fetchAll(PDO::FETCH_ASSOC);


			
			$stmt = $pdo->prepare("INSERT INTO account (AccountID, acc_username, acc_password, acc_name, acc_type, acc_restriction, affiliated_church, affiliated_churchname, verify_status) 
            VALUES (:AccountID, :acc_username, :acc_password, :acc_name, :acc_type, :acc_restriction, :affiliated_church, :affiliated_churchname, :verify_status)");

			$stmt->bindParam(":AccountID",  $accountid[0]['account_id'], PDO::PARAM_STR);
			$stmt->bindParam(":acc_username", $data["user-name"], PDO::PARAM_STR);
            $stmt->bindParam(":acc_password", $data["user-password"], PDO::PARAM_STR);
			$stmt->bindParam(":acc_name", $data["user-password"], PDO::PARAM_STR);
			$stmt->bindParam(":acc_type", $acc_type, PDO::PARAM_STR);
            $stmt->bindParam(":acc_restriction", $data["account_type"], PDO::PARAM_STR);
			$stmt->bindParam(":affiliated_church",  $church_id, PDO::PARAM_STR);
			$stmt->bindParam(":affiliated_churchname",  $church_name, PDO::PARAM_STR);
			$stmt->bindParam(":verify_status",  $verify_status, PDO::PARAM_STR);
					
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