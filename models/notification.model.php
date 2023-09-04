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

 


}


?>