<?php
require_once "connection.php";

// require '../extensions/PHPMailer-master/src/Exception.php';
// require '../extensions/PHPMailer-master/src/PHPMailer.php';
// require '../extensions/PHPMailer-master/src/SMTP.php';


// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

class ModelSuperUser{

    public static function mdlShowChurchList($data){
        
        $rejected_status = 0;
        $stmt = (new Connection)->connect()->prepare("SELECT * FROM churches WHERE church_status = :church_status AND rejected_status = :rejected_status ORDER BY status_date DESC");
        $stmt->bindParam(":church_status", $data, PDO::PARAM_INT);
        $stmt->bindParam(":rejected_status", $rejected_status, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
	
    }

    public static function mdlShowChurchListExplore($data){
        
        $rejected_status = 0;
        $stmt = (new Connection)->connect()->prepare("SELECT * FROM churches WHERE church_status = :church_status AND rejected_status = :rejected_status ORDER BY RAND()
        LIMIT 5");
        $stmt->bindParam(":church_status", $data, PDO::PARAM_INT);
        $stmt->bindParam(":rejected_status", $rejected_status, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
	
    }

    public static function mldShowRejectedChurches($data){
        
        $rejected_status = 1;
        $stmt = (new Connection)->connect()->prepare("SELECT * FROM churches WHERE rejected_status = :rejected_status ORDER BY status_date DESC");
        $stmt->bindParam(":rejected_status", $rejected_status, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
	
    }





    public static function mdlGetChurchDetails($data){
        

        $stmt = (new Connection)->connect()->prepare("SELECT churchID, church_name, church_email, church_num, church_address, church_city, religion FROM churches WHERE churchID = :churchID ");
        $stmt->bindParam(":churchID", $data['church_id'], PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;	
	
    }


    public static function mdlAcceptChurch($data){

             
        $db = new Connection();
        $pdo = $db->connect();

        $accept = 1;
        $current_date = date('Y-m-d');
        
        $current_year = substr(date('Y'), -2 );
        $current_month = date('n');


        $stmt = (new Connection)->connect()->prepare("UPDATE churches SET church_status = :church_status, status_date = :status_date WHERE churchID = :churchID ");
        $stmt->bindParam(":churchID", $data['church_id'], PDO::PARAM_STR);
        $stmt->bindParam(":church_status", $accept, PDO::PARAM_INT);
        $stmt->bindParam(":status_date", $current_date, PDO::PARAM_STR);
		$stmt -> execute();
		$stmt = null;	

        
        $title = "Church Registration Accepted";
        $type = 'Accepted';
        $notification = "Your Church Registration has been accepted.";

        
                
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

            
            $notif_id = (new Connection)->connect()->prepare("SELECT CONCAT('N', LPAD((count(id)+1),4,'0'), '$current_month','$current_year') as notif_id  FROM notifications FOR UPDATE");
            $notif_id->execute();
            $notifid = $notif_id -> fetchAll(PDO::FETCH_ASSOC);
            

            
            $stmt2 = $pdo->prepare("INSERT INTO notifications (notificationID, recipientID, recipient_name, notification_title, notification_type, notification_text) 
            VALUES (:notificationID, :recipientID, :recipient_name, :notification_title, :notification_type, :notification_text)");

            $stmt2->bindParam(":notificationID", $notifid[0]['notif_id'], PDO::PARAM_STR);
            $stmt2->bindParam(":recipientID", $data['church_id'], PDO::PARAM_STR);
            $stmt2->bindParam(":recipient_name", $data['church_name'], PDO::PARAM_STR);
            $stmt2->bindParam(":notification_title", $title, PDO::PARAM_STR);
            $stmt2->bindParam(":notification_type", $type, PDO::PARAM_STR);
            $stmt2->bindParam(":notification_text", $notification, PDO::PARAM_STR);


            $stmt2->execute();		
            $pdo->commit();
            return "ok";
        }catch (Exception $e){
            return "Error: " . $e->getMessage();
            $pdo->rollBack();
        }	
        $pdo = null;	
        $stmt2 = null;
	
    }

    
    public static function mdlRejectChurch($data){

        $db = new Connection();
        $pdo = $db->connect();
        
        $reject = 1;
        $current_date = date('Y-m-d');
        
        $current_year = substr(date('Y'), -2 );
        $current_month = date('n');


        $stmt = (new Connection)->connect()->prepare("UPDATE churches SET rejected_status = :rejected_status, status_date = :status_date WHERE churchID = :churchID ");
        $stmt->bindParam(":churchID", $data['church_id'], PDO::PARAM_STR);
        $stmt->bindParam(":rejected_status", $reject, PDO::PARAM_INT);
        $stmt->bindParam(":status_date", $current_date, PDO::PARAM_STR);
		$stmt -> execute();
		$stmt = null;	


           
        $title = "Church Registration Rejected";
        $type = 'Rejected';
        $notification = "Your Church Registration has been rejected.";

        
                
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

            
            $notif_id = (new Connection)->connect()->prepare("SELECT CONCAT('N', LPAD((count(id)+1),4,'0'), '$current_month','$current_year') as notif_id  FROM notifications FOR UPDATE");
            $notif_id->execute();
            $notifid = $notif_id -> fetchAll(PDO::FETCH_ASSOC);
            

            
            $stmt2 = $pdo->prepare("INSERT INTO notifications (notificationID, recipientID, recipient_name, notification_title, notification_type, notification_text) 
            VALUES (:notificationID, :recipientID, :recipient_name, :notification_title, :notification_type, :notification_text)");

            $stmt2->bindParam(":notificationID", $notifid[0]['notif_id'], PDO::PARAM_STR);
            $stmt2->bindParam(":recipientID", $data['church_id'], PDO::PARAM_STR);
            $stmt2->bindParam(":recipient_name", $data['church_name'], PDO::PARAM_STR);
            $stmt2->bindParam(":notification_title", $title, PDO::PARAM_STR);
            $stmt2->bindParam(":notification_type", $type, PDO::PARAM_STR);
            $stmt2->bindParam(":notification_text", $notification, PDO::PARAM_STR);


            $stmt2->execute();		
            $pdo->commit();
            return "ok";
        }catch (Exception $e){
            return "Error: " . $e->getMessage();
            $pdo->rollBack();
        }	
        $pdo = null;	
        $stmt2 = null;
	
    }




    //todo
    public static function mdlAcceptAllChurch($data){

        $accept = 1;

        $stmt = (new Connection)->connect()->prepare("UPDATE churches SET church_status = :church_status WHERE churchID = :churchID ");
        $stmt->bindParam(":churchID", $data['church_id'], PDO::PARAM_STR);
        $stmt->bindParam(":church_status", $accept, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;	
	
    }

    public static function mdlAcceptAllChurch1($data){

        $accept = 1;

        $stmt = (new Connection)->connect()->prepare("UPDATE churches SET church_status = :church_status WHERE churchID = :churchID ");
        $stmt->bindParam(":churchID", $data['church_id'], PDO::PARAM_STR);
        $stmt->bindParam(":church_status", $accept, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;	
	
    }





    

}

?>