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
		$user_name = 'Subuser-' . $church_id;
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

			$current_year = substr(date('Y'), -2 );
			$current_month = date('n');

			$account_id = (new Connection)->connect()->prepare("SELECT CONCAT('SU', LPAD((count(id)+1),4,'0'), '$current_month','$current_year') as account_id  FROM account FOR UPDATE");
			$account_id->execute();
			$accountid = $account_id -> fetchAll(PDO::FETCH_ASSOC);


			
			$stmt = $pdo->prepare("INSERT INTO account (AccountID, acc_username, acc_password, fname, acc_type, acc_restriction, affiliated_church, affiliated_churchname, verify_status) 
            VALUES (:AccountID, :acc_username, :acc_password, :fname, :acc_type, :acc_restriction, :affiliated_church, :affiliated_churchname, :verify_status)");

			$stmt->bindParam(":AccountID",  $accountid[0]['account_id'], PDO::PARAM_STR);
			$stmt->bindParam(":acc_username", $data["user-name"], PDO::PARAM_STR);
            $stmt->bindParam(":acc_password", $data["user-password"], PDO::PARAM_STR);
			$stmt->bindParam(":fname", $user_name, PDO::PARAM_STR);
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

	public static function mdlShowUserAccount(){
        
        $memID = $_COOKIE["church_id"];
        $stmt = (new Connection)->connect()->prepare("SELECT * FROM membership WHERE memChurchID = :memChurchID AND membership_status = 1" );
        $stmt->bindParam(":memChurchID", $memID, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
	

		
    }


	public static function mdlGetReportChurch() {
		$churchID = $_COOKIE['church_id'];
		$stmt = (new Connection)->connect()->prepare("SELECT event_date FROM calendar WHERE churchID = :churchID");
		$stmt->bindParam(":churchID", $churchID, PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt->closeCursor(); // Close the cursor to free up resources
		return $result;
	}


	static public function mdlTotalEvent() {

		$churchID = $_COOKIE['church_id'];

	
		try {
			$currentMonth = date('m');
        	$currentYear = date('Y');

			// Use SQL's MONTH() and YEAR() functions to filter events for the current month
			$stmt = (new Connection)->connect()->prepare("SELECT COUNT(*) as total_event FROM calendar WHERE churchID = :churchID AND MONTH(event_date) = :currentMonth AND YEAR(event_date) = :currentYear");
			$stmt->bindParam(":churchID", $churchID, PDO::PARAM_STR);
			$stmt->bindParam(":currentMonth", $currentMonth, PDO::PARAM_STR);
			$stmt->bindParam(":currentYear", $currentYear, PDO::PARAM_STR);
			$stmt->execute();
			$totalEvent = $stmt->fetch(PDO::FETCH_ASSOC)['total_event'];
			$stmt->closeCursor(); // Close the cursor to free up resources
			return $totalEvent;
		} catch (PDOException $e) {
			// Handle any database connection or query error here
			return -1;
		}
	}

	static public function mdlAddSubMember($data) {
		$db = new Connection();
		$pdo = $db->connect();
		$church_id = $_COOKIE['church_id'];
		$church_name = $_COOKIE['church_name'];
		try {
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

        
			// Use SQL's MONTH() and YEAR() functions to filter events for the current month
			$stmt = $pdo->prepare("UPDATE account SET acc_type = :acc_type, acc_restriction = :acc_restriction, affiliated_church = :affiliated_church, affiliated_churchname = :affiliated_churchname WHERE AccountID = :AccountID");
			$stmt->bindParam(":AccountID", $data['memID'], PDO::PARAM_STR);
			$stmt->bindParam(":acc_type", $data['account_type'], PDO::PARAM_STR);
			$stmt->bindParam(":acc_restriction", $data['restriction'], PDO::PARAM_STR);
			$stmt->bindParam(":affiliated_churchname", $church_name, PDO::PARAM_STR);
			$stmt->bindParam(":affiliated_church", $church_id, PDO::PARAM_STR);
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