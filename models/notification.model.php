<?php
require_once "connection.php";


class ModelNotifications{


    public function mdlGetCollaborationNotif()
    {
        $churchID =  $_COOKIE['church_id'];

        $stmt = (new Connection)->connect()->prepare("SELECT * FROM notifications WHERE recipientID = :recipientID ORDER BY created_by DESC, id DESC");   
        $stmt->bindParam(':recipientID', $churchID, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function mdlGetCollaborationNotifPublic()
    {
        $churchID =  $_COOKIE['acc_id'];

        $stmt = (new Connection)->connect()->prepare("SELECT * FROM notifications WHERE recipientID = :recipientID ORDER BY created_by DESC, id DESC");   
        $stmt->bindParam(':recipientID', $churchID, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function mdlclearNotifications($data)
    {
       	    		
		$db = new Connection();
        $pdo = $db->connect();
		
        $status = 1;

        try{
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

			$status = $pdo->prepare("UPDATE notifications SET notification_status = :notification_status WHERE recipientID = :recipientID ");
			$status->bindParam(":recipientID", $data["recipient_id"], PDO::PARAM_STR);
			$status->bindParam(":notification_status", $status, PDO::PARAM_INT);
			$status->execute();
            
			$pdo->commit();
			echo "success";	
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
		$pdo = null;	
		$stmt = null;
    }

    public function mdlAddWarningNotif($data)
    {
       	    		
		$db = new Connection();
        $pdo = $db->connect();

        $newStatus = 0;

        try{
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();
			$status2 = $pdo->prepare("UPDATE reports SET display_status = :display_status WHERE reportID = :reportID");
            $status2->bindParam(":reportID", $data["report_id"], PDO::PARAM_STR);
            $status2->bindParam(":display_status", $newStatus, PDO::PARAM_INT);
            $status2->execute();
        	$pdo->commit();
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
		

        try{
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

			$status = $pdo->prepare("INSERT INTO notifications (recipientID, notification_title, notification_type, notification_text)
            VALUES (:recipientID, :notification_title, :notification_type, :notification_text)");

			$status->bindParam(":recipientID", $data["reported_id"], PDO::PARAM_STR);
            $status->bindParam(":notification_title", $data["notifcation_title"], PDO::PARAM_STR);
            $status->bindParam(":notification_type", $data["notifcation_type"], PDO::PARAM_STR);
            $status->bindParam(":notification_text", $data["report"], PDO::PARAM_STR);
           $status->execute();
			$pdo->commit();
            return  "ok";
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
		$pdo = null;	
		$stmt = null;
    }

    
 


}


?>