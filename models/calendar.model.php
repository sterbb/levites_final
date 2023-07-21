<?php
require_once "connection.php";

class ModelCalendar{

    public static function mdlAddEvent($data){	
		$db = new Connection();
        $pdo = $db->connect();
        $accID = $_COOKIE["acc_id"];
        $churchID = $_COOKIE["church_id"];
        


        
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

            $current_year = substr(date('Y'), -2 );
			$current_month = date('n');

            
			$event_id = (new Connection)->connect()->prepare("SELECT CONCAT('CE', LPAD((count(id)+1),4,'0'), '$current_month','$current_year') as event_id  FROM calendar FOR UPDATE");
			$event_id->execute();
			$eventID = $event_id -> fetchAll(PDO::FETCH_ASSOC);
			

			
			$stmt = $pdo->prepare("INSERT INTO calendar (churchID, eventID, event_title, event_category, event_date, event_time)
            VALUES (:churchID, :eventID, :event_title, :event_category, :event_date, :event_time)");

			// $stmt = $pdo->prepare("INSERT INTO register (AccountID,acc_username,acc_password,acc_email,acc_type,fname,lname,designation,acc_contact,religion,verify_token,created_at) 
            // VALUES (:AccountID,:acc_username,:acc_password,:acc_email,:acc_type,:fname,:lname,:designation,:acc_contact,:religion,:verify_token,:created_at)");

			$stmt->bindParam(":churchID", $churchID, PDO::PARAM_STR);
			$stmt->bindParam(":eventID", $eventID[0]['event_id'], PDO::PARAM_STR);
			$stmt->bindParam(":event_title", $data["event_title"], PDO::PARAM_STR);
			$stmt->bindParam(":event_category", $data["event_type"], PDO::PARAM_STR);
			$stmt->bindParam(":event_date", $data["event_date"], PDO::PARAM_STR);
			$stmt->bindParam(":event_time", $data["event_time"], PDO::PARAM_STR);


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

        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

			//GROUP ID

            // $current_year = substr(date('Y'), -2 );
			// $current_month = date('n');
            
			// $event_id = (new Connection)->connect()->prepare("SELECT CONCAT('CE', LPAD((count(id)+1),4,'0'), '$current_month','$current_year') as event_id  FROM calendar FOR UPDATE");
			// $event_id->execute();
			// $eventID = $event_id -> fetchAll(PDO::FETCH_ASSOC);
			

			
			$stmt = $pdo->prepare("INSERT INTO calendargroup (group_name, memberList, emailList)
            VALUES (:group_name, :memberList, :emailList)");

			// $stmt->bindParam(":eventID", $eventID[0]['event_id'], PDO::PARAM_STR);
			$stmt->bindParam(":group_name", $data["group_name"], PDO::PARAM_STR);
			$stmt->bindParam(":memberList", $data["group_members"], PDO::PARAM_STR);
			$stmt->bindParam(":emailList", $data["members_email"], PDO::PARAM_STR);


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
	public static function mdlAddEventType($data){	
		$db = new Connection();
        $pdo = $db->connect();
        $EventTypeID = $_COOKIE["church_id"];

        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();
			
			
			$stmt = $pdo->prepare("INSERT INTO eventtype (churchID, type_name)
            VALUES (:churchID, :type_name)");

			// $stmt->bindParam(":eventID", $eventID[0]['event_id'], PDO::PARAM_STR);
			$stmt->bindParam(":churchID", $EventTypeID, PDO::PARAM_STR);
			$stmt->bindParam(":type_name", $data["type_name"], PDO::PARAM_STR);


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


	public static function mdlShowEventType(){
        $eventType = $_COOKIE["church_id"];
        $stmt = (new Connection)->connect()->prepare("SELECT * FROM eventtype WHERE churchID = :churchID");
        $stmt->bindParam(":churchID", $eventType, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
	
    }

	public static function mdlDeleteEventType() {
		$eventId = $_POST["id"]; // Assuming the id is sent through the POST data
		$stmt = (new Connection)->connect()->prepare("DELETE FROM eventtype WHERE id = :id");
		$stmt->bindParam(":id", $eventId, PDO::PARAM_INT); // Assuming id is an integer
		$result = $stmt->execute(); // Execute the delete query
	
		if ($result) {
			// Return true if the deletion was successful
			return true;
		} else {
			// Return false if the deletion failed
			return false;
		}
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
	



}