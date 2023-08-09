<?php
require_once "connection.php";
class CollaborationModel
{
    public function searchChurches($query)
    {
        $church_name =  $query["churchName"] . '%';

        $stmt = (new Connection)->connect()->prepare("SELECT * FROM churches WHERE church_name LIKE :query");
        $stmt->bindParam(':query', $church_name, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function mdlshowPendingRequest(){

        $church_id = $_COOKIE['church_id'];
        $status = 0;
        

        $stmt = (new Connection)->connect()->prepare("SELECT collabID, churchid2, churchname2 FROM churchcollab WHERE churchid1 = :churchid1 AND reject_status = :reject_status AND cancel_status = :cancel_status AND collab_status = :collab_status");
        $stmt->bindParam(':churchid1', $church_id, PDO::PARAM_STR);
        $stmt->bindParam(':reject_status', $status, PDO::PARAM_INT);
        $stmt->bindParam(':collab_status', $status, PDO::PARAM_INT);
        $stmt->bindParam(':cancel_status', $status, PDO::PARAM_INT);


        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    


    }

    static public function mdlshowAffilatedChurches(){

        $church_id = $_COOKIE['church_id'];
        $collab_status = 1;

        $stmt = (new Connection)->connect()->prepare("SELECT collabID, churchid2, churchname2 FROM churchcollab WHERE churchid1 = :churchid1 AND collab_status =:collab_status ");
        $stmt->bindParam(':churchid1', $church_id, PDO::PARAM_STR);
        $stmt->bindParam(':collab_status', $collab_status, PDO::PARAM_INT);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        
        // Check if there are no results


            $stmt2 = (new Connection)->connect()->prepare("SELECT collabID, churchid1, churchname1 FROM churchcollab WHERE churchid2 = :churchid2  AND collab_status =:collab_status");
            $stmt2->bindParam(':churchid2', $church_id, PDO::PARAM_STR);
            $stmt2->bindParam(':collab_status', $collab_status, PDO::PARAM_INT);
            $stmt2->execute();
    
            $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

 
          
            $result2 = array_merge($result2, $results);
            
            // Return the array containing results from both queries
            return $result2;


    }

    static public function mdlshowRequests(){

        $church_id = $_COOKIE['church_id'];
        $status = 0;

        $stmt = (new Connection)->connect()->prepare("SELECT collabID, churchid1, churchname1 FROM churchcollab WHERE churchid2 = :churchid2 AND reject_status = :reject_status AND cancel_status = :cancel_status AND collab_status = :collab_status");
        $stmt->bindParam(':churchid2', $church_id, PDO::PARAM_STR);
        $stmt->bindParam(':reject_status', $status, PDO::PARAM_INT);
        $stmt->bindParam(':collab_status', $status, PDO::PARAM_INT);
        $stmt->bindParam(':cancel_status', $status, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    static public function mdlshowRejected(){

        $church_id = $_COOKIE['church_id'];
        $rejected_status = 1;

        $stmt = (new Connection)->connect()->prepare("SELECT collabID, churchid2, churchname2 FROM churchcollab WHERE churchid1 = :churchid1 AND reject_status =:reject_status ");
        $stmt->bindParam(':churchid1', $church_id, PDO::PARAM_STR);
        $stmt->bindParam(':reject_status', $rejected_status, PDO::PARAM_INT);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        
        // Check if there are no results


            $stmt2 = (new Connection)->connect()->prepare("SELECT collabID, churchid1, churchname1 FROM churchcollab WHERE churchid2 = :churchid2  AND reject_status =:reject_status ");
            $stmt2->bindParam(':churchid2', $church_id, PDO::PARAM_STR);
            $stmt2->bindParam(':reject_status', $rejected_status, PDO::PARAM_INT);
            $stmt2->execute();
    
            $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

 
          
            $result2 = array_merge($result2, $results);
            
            // Return the array containing results from both queries
            return $result2;

    }

    



    public function mdladdCollaboration($data)
    {

        $db = new Connection();
        $pdo = $db->connect();

        $churchname1 = $_COOKIE["church_name"];
        $churchid1 = $_COOKIE['church_id'];

        $current_year = substr(date('Y'), -2 );
        $current_month = date('n');

        $collabDate = date('Y-m-d');

        
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

            
			$collab_id = (new Connection)->connect()->prepare("SELECT CONCAT('COL', LPAD((count(id)+1),4,'0'), '$current_month','$current_year') as collab_id  FROM churchcollab FOR UPDATE");
			$collab_id->execute();
			$collabid = $collab_id -> fetchAll(PDO::FETCH_ASSOC);

			
			$stmt = $pdo->prepare("INSERT INTO churchcollab (collabID, churchid1, churchname1, churchid2, churchname2, collabdate) 
            VALUES (:collabID, :churchid1, :churchname1, :churchid2, :churchname2, :collabdate)");

			$stmt->bindParam(":collabID", $collabid[0]['collab_id'], PDO::PARAM_STR);
			$stmt->bindParam(":churchid1", $churchid1, PDO::PARAM_STR);
            $stmt->bindParam(":churchname1", $churchname1, PDO::PARAM_STR);
            $stmt->bindParam(":churchid2", $data['churchid2'], PDO::PARAM_STR);
            $stmt->bindParam(":churchname2", $data['churchName'], PDO::PARAM_STR);
            $stmt->bindParam(":collabdate", $collabDate, PDO::PARAM_STR);

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

    static public function mdlCancelRequest($data){

        $cancel = 1;
    
        $stmt = (new Connection)->connect()->prepare("UPDATE churchcollab SET cancel_status = :cancel_status WHERE collabID = :collabID ");
        $stmt->bindParam(":collabID", $data['collabID'], PDO::PARAM_STR);
        $stmt->bindParam(":cancel_status", $cancel, PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close();
        $stmt = null;	
    
    }

    static public function mdlAcceptCollab($data){

        
        $db = new Connection();
        $pdo = $db->connect();


        $current_year = substr(date('Y'), -2 );
        $current_month = date('n');

        $collabDate = date('Y-m-d');

        $title = "Request Accepted";
        $type = 'Accepted';
        $notification = $_COOKIE['church_name'] . " accepted the collaboration.";



      
        $accept = 1;
    
        $stmt2 = (new Connection)->connect()->prepare("UPDATE churchcollab SET collab_status = :collab_status WHERE collabID = :collabID ");
        $stmt2->bindParam(":collabID", $data['collabID'], PDO::PARAM_STR);
        $stmt2->bindParam(":collab_status", $accept, PDO::PARAM_INT);
        $stmt2 -> execute();
        $stmt2 = null;	
    

                
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

            
			$notif_id = (new Connection)->connect()->prepare("SELECT CONCAT('N', LPAD((count(id)+1),4,'0'), '$current_month','$current_year') as notif_id  FROM notifications FOR UPDATE");
			$notif_id->execute();
			$notifid = $notif_id -> fetchAll(PDO::FETCH_ASSOC);
            

			
			$stmt = $pdo->prepare("INSERT INTO notifications (notificationID, recipientID, recipient_name, notification_title, notification_type, notification_text) 
            VALUES (:notificationID, :recipientID, :recipient_name, :notification_title, :notification_type, :notification_text)");

			$stmt->bindParam(":notificationID", $notifid[0]['notif_id'], PDO::PARAM_STR);
			$stmt->bindParam(":recipientID", $data['churchID'], PDO::PARAM_STR);
            $stmt->bindParam(":recipient_name", $data['church_name'], PDO::PARAM_STR);
            $stmt->bindParam(":notification_title", $title, PDO::PARAM_STR);
            $stmt->bindParam(":notification_type", $type, PDO::PARAM_STR);
            $stmt->bindParam(":notification_text", $notification, PDO::PARAM_STR);
  

            $stmt->execute();		
		    $pdo->commit();
            return "ok";
		}catch (Exception $e){
            return "Error: " . $e->getMessage();
			$pdo->rollBack();
		}	
		$pdo = null;	
		$stmt = null;


        

    }


    static public function mdlRejectCollab($data){

        
        $db = new Connection();
        $pdo = $db->connect();


        $current_year = substr(date('Y'), -2 );
        $current_month = date('n');

        $collabDate = date('Y-m-d');

        $title = "Request Rejected";
        $type = 'Rejected';
        $notification = $_COOKIE['church_name'] . " rejected the collaboration.";



        $accept = 1;
    
        $stmt2 = (new Connection)->connect()->prepare("UPDATE churchcollab SET reject_status = :reject_status WHERE collabID = :collabID ");
        $stmt2->bindParam(":collabID", $data['collabID'], PDO::PARAM_STR);
        $stmt2->bindParam(":reject_status", $accept, PDO::PARAM_INT);
        $stmt2 -> execute();
        $stmt2 = null;	

                
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

            
			$notif_id = (new Connection)->connect()->prepare("SELECT CONCAT('N', LPAD((count(id)+1),4,'0'), '$current_month','$current_year') as notif_id  FROM notifications FOR UPDATE");
			$notif_id->execute();
			$notifid = $notif_id -> fetchAll(PDO::FETCH_ASSOC);
            

			
			$stmt = $pdo->prepare("INSERT INTO notifications (notificationID, recipientID, recipient_name, notification_title, notification_type, notification_text) 
            VALUES (:notificationID, :recipientID, :recipient_name, :notification_title, :notification_type, :notification_text)");

			$stmt->bindParam(":notificationID", $notifid[0]['notif_id'], PDO::PARAM_STR);
			$stmt->bindParam(":recipientID", $data['churchID'], PDO::PARAM_STR);
            $stmt->bindParam(":recipient_name", $data['church_name'], PDO::PARAM_STR);
            $stmt->bindParam(":notification_title", $title, PDO::PARAM_STR);
            $stmt->bindParam(":notification_type", $type, PDO::PARAM_STR);
            $stmt->bindParam(":notification_text", $notification, PDO::PARAM_STR);
  

            $stmt->execute();		
		    $pdo->commit();
            return "ok";
		}catch (Exception $e){
            return "Error: " . $e->getMessage();
			$pdo->rollBack();
		}	
		$pdo = null;	
		$stmt = null;

    
    }

    static public function mdlRemoveCollab($data){

        $remove = 0;
    
        $stmt = (new Connection)->connect()->prepare("UPDATE churchcollab SET collab_status = :collab_status WHERE collabID = :collabID ");
        $stmt->bindParam(":collabID", $data['collabID'], PDO::PARAM_STR);
        $stmt->bindParam(":collab_status", $remove, PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close();
        $stmt = null;	
    
    }

    
public function mdladdMembership($data)
{
    $db = new Connection();
    $pdo = $db->connect();

    $memberName = $_COOKIE["acc_name"];
    $memberID = $_COOKIE['acc_id'];
    $memberEmail = $_COOKIE['acc_email'];

    $current_year = substr(date('Y'), -2 );
    $current_month = date('n');
    
    try{
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->beginTransaction();

        
        $mship_id = (new Connection)->connect()->prepare("SELECT CONCAT('MEM', LPAD((count(id)+1),4,'0'), '$current_month','$current_year') as mship_id  FROM membership FOR UPDATE");
        $mship_id->execute();
        $mshipid = $mship_id -> fetchAll(PDO::FETCH_ASSOC);

        
        $stmt = $pdo->prepare("INSERT INTO membership (mshipID, memberID, memberName, memChurchID, memChurchName, memberEmail) 
        VALUES (:mshipID, :memberID, :memberName, :memChurchID, :memChurchName, :memberEmail)");

        $stmt->bindParam(":mshipID", $mshipid[0]['mship_id'], PDO::PARAM_STR);
        $stmt->bindParam(":memberID", $memberID, PDO::PARAM_STR);
        $stmt->bindParam(":memberName", $memberName, PDO::PARAM_STR);
        $stmt->bindParam(":memChurchID", $data['memChurchID'], PDO::PARAM_STR);
        $stmt->bindParam(":memChurchName", $data['memChurchName'], PDO::PARAM_STR);
        $stmt->bindParam(":memberEmail", $memberEmail, PDO::PARAM_STR);
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


static public function mdlshowMembership(){

    $acc_id = $_COOKIE['church_id'];
    $status = 0;

    $stmt = (new Connection)->connect()->prepare("SELECT mshipID, memberID, memberName FROM membership WHERE memChurchID = :memChurchID AND rejmship_status = :rejmship_status AND canmship_status = :canmship_status AND membership_status = :membership_status");
    $stmt->bindParam(':memChurchID', $acc_id, PDO::PARAM_STR);
    $stmt->bindParam(':rejmship_status', $status, PDO::PARAM_INT);
    $stmt->bindParam(':membership_status', $status, PDO::PARAM_INT);
    $stmt->bindParam(':canmship_status', $status, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);


}

    static public function mdlRejectMembership(){

        $acc_id = $_COOKIE['church_id'];
        $status = 1;

        $stmt = (new Connection)->connect()->prepare("SELECT mshipID, memberID, memberName FROM membership WHERE memChurchID = :memChurchID AND rejmship_status = :rejmship_status");
        $stmt->bindParam(':memChurchID', $acc_id, PDO::PARAM_STR);
        $stmt->bindParam(':rejmship_status', $status, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }

static public function mdlshowAffilatedMember(){

    $acc_id = $_COOKIE['church_id'];
    $status = 1;

    $stmt = (new Connection)->connect()->prepare("SELECT mshipID, memChurchID, memberName FROM membership WHERE memChurchID = :memChurchID AND membership_status =:membership_status");
    $stmt->bindParam(':memChurchID', $acc_id, PDO::PARAM_STR);
    $stmt->bindParam(':membership_status', $status, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}


static public function mdlMemberAccept($data){

     
    $db = new Connection();
    $pdo = $db->connect();


    $current_year = substr(date('Y'), -2 );
    $current_month = date('n');

    $collabDate = date('Y-m-d');

    $title = "Membership Accepted";
    $type = 'Accepted';
    $notification = $_COOKIE['church_name'] . " accepted your membership request.";


    $membershipDate = date('Y-m-d');

    $reject = 0;
    $accept = 1;

    $stmt2 = (new Connection)->connect()->prepare("UPDATE membership SET membership_status = :membership_status, membershipDate = :membershipDate, rejmship_status = :rejmship_status  WHERE mshipID = :mshipID ");
    $stmt2->bindParam(":mshipID", $data['mshipID'], PDO::PARAM_STR);
    $stmt2->bindParam(":membership_status", $accept, PDO::PARAM_INT);
    $stmt2->bindParam(":membershipDate", $membershipDate, PDO::PARAM_STR);
    $stmt2->bindParam(":rejmship_status", $reject, PDO::PARAM_STR);

    $stmt2 -> execute();
    $stmt2 = null;	



            
    try{
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->beginTransaction();

        
        $notif_id = (new Connection)->connect()->prepare("SELECT CONCAT('N', LPAD((count(id)+1),4,'0'), '$current_month','$current_year') as notif_id  FROM notifications FOR UPDATE");
        $notif_id->execute();
        $notifid = $notif_id -> fetchAll(PDO::FETCH_ASSOC);
        

        
        $stmt = $pdo->prepare("INSERT INTO notifications (notificationID, recipientID, recipient_name, notification_title, notification_type, notification_text) 
        VALUES (:notificationID, :recipientID, :recipient_name, :notification_title, :notification_type, :notification_text)");

        $stmt->bindParam(":notificationID", $notifid[0]['notif_id'], PDO::PARAM_STR);
        $stmt->bindParam(":recipientID", $data['acc_id'], PDO::PARAM_STR);
        $stmt->bindParam(":recipient_name", $data['acc_name'], PDO::PARAM_STR);
        $stmt->bindParam(":notification_title", $title, PDO::PARAM_STR);
        $stmt->bindParam(":notification_type", $type, PDO::PARAM_STR);
        $stmt->bindParam(":notification_text", $notification, PDO::PARAM_STR);


        $stmt->execute();		
        $pdo->commit();
        return "ok";
    }catch (Exception $e){
        return "Error: " . $e->getMessage();
        $pdo->rollBack();
    }	
    $pdo = null;	
    $stmt = null;



}

static public function mdlMemberReject($data){

    
     
    $db = new Connection();
    $pdo = $db->connect();


    $current_year = substr(date('Y'), -2 );
    $current_month = date('n');

    $collabDate = date('Y-m-d');

    $title = "Membership Rejected";
    $type = 'Rejected';
    $notification = $_COOKIE['church_name'] . " rejected your membership request.";


    $membershipDate = date('Y-m-d');


    $accept = 1;

    $stmt2 = (new Connection)->connect()->prepare("UPDATE membership SET rejmship_status = :rejmship_status WHERE mshipID = :mshipID ");
    $stmt2->bindParam(":mshipID", $data['mshipID'], PDO::PARAM_STR);
    $stmt2->bindParam(":rejmship_status", $accept, PDO::PARAM_INT);
    $stmt2 -> execute();
    $stmt2 = null;	



            
    try{
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->beginTransaction();

        
        $notif_id = (new Connection)->connect()->prepare("SELECT CONCAT('N', LPAD((count(id)+1),4,'0'), '$current_month','$current_year') as notif_id  FROM notifications FOR UPDATE");
        $notif_id->execute();
        $notifid = $notif_id -> fetchAll(PDO::FETCH_ASSOC);
        

        
        $stmt = $pdo->prepare("INSERT INTO notifications (notificationID, recipientID, recipient_name, notification_title, notification_type, notification_text) 
        VALUES (:notificationID, :recipientID, :recipient_name, :notification_title, :notification_type, :notification_text)");

        $stmt->bindParam(":notificationID", $notifid[0]['notif_id'], PDO::PARAM_STR);
        $stmt->bindParam(":recipientID", $data['acc_id'], PDO::PARAM_STR);
        $stmt->bindParam(":recipient_name", $data['acc_name'], PDO::PARAM_STR);
        $stmt->bindParam(":notification_title", $title, PDO::PARAM_STR);
        $stmt->bindParam(":notification_type", $type, PDO::PARAM_STR);
        $stmt->bindParam(":notification_text", $notification, PDO::PARAM_STR);


        $stmt->execute();		
        $pdo->commit();
        return "ok";
    }catch (Exception $e){
        return "Error: " . $e->getMessage();
        $pdo->rollBack();
    }	
    $pdo = null;	
    $stmt = null;



}


static public function mdlMemberRemove($data){

    $remove = 0;

    $stmt = (new Connection)->connect()->prepare("UPDATE membership SET membership_status = :membership_status WHERE mshipID = :mshipID ");
    $stmt->bindParam(":mshipID", $data['mshipID'], PDO::PARAM_STR);
    $stmt->bindParam(":membership_status", $remove, PDO::PARAM_INT);
    $stmt -> execute();
    return $stmt -> fetch();
    $stmt -> close();
    $stmt = null;	

}

static public function mdlMemberReport() {
    $churchID = $_COOKIE['church_id'];
    $stmt = (new Connection)->connect()->prepare("SELECT membershipDate FROM membership WHERE memChurchID = :memChurchID ");
    $stmt->bindParam(":memChurchID", $churchID, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor(); // Close the cursor to free up resources
    return $result;
}

static public function mdlAffiliatedMemberReport() {
    
    $memberStatus = 1;
    $churchID = $_COOKIE['church_id'];
    $stmt = (new Connection)->connect()->prepare("SELECT membershipDate FROM membership WHERE memChurchID = :memChurchID AND membership_status = :membership_status");
    $stmt->bindParam(":memChurchID", $churchID, PDO::PARAM_STR);
    $stmt->bindParam(":membership_status", $memberStatus, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    
}




static public function mdlTotalMember() {
    $churchID = $_COOKIE['church_id'];

    try {
        $stmt = (new Connection)->connect()->prepare("SELECT COUNT(*) as total_member FROM membership WHERE memChurchID = :memChurchID AND membership_status = 1");
        $stmt->bindParam(":memChurchID", $churchID, PDO::PARAM_STR);
        $stmt->execute();
        $totalMember = $stmt->fetch(PDO::FETCH_ASSOC)['total_member'];
        $stmt->closeCursor(); // Close the cursor to free up resources
        return $totalMember;
    } catch (PDOException $e) {
        // Handle any database connection or query error here
        return -1;
    }
}




static public function mdlTotalAffiliated() {

    $church_id = $_COOKIE['church_id'];

    $collab_status = 1;

    $stmt = (new Connection)->connect()->prepare("SELECT collabID, churchid2, churchname2, collabdate FROM churchcollab WHERE churchid1 = :churchid1 AND collab_status =:collab_status ");
    $stmt->bindParam(':churchid1', $church_id, PDO::PARAM_STR);
    $stmt->bindParam(':collab_status', $collab_status, PDO::PARAM_INT);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    // Check if there are no results


    $stmt2 = (new Connection)->connect()->prepare("SELECT collabID, churchid1, churchname1, collabdate FROM churchcollab WHERE churchid2 = :churchid2  AND collab_status =:collab_status");
    $stmt2->bindParam(':churchid2', $church_id, PDO::PARAM_STR);
    $stmt2->bindParam(':collab_status', $collab_status, PDO::PARAM_INT);
    $stmt2->execute();

    $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);


    
    $result2 = array_merge($result2, $results);
    
    // Return the array containing results from both queries
    return $result2;





    // $churchID = $_COOKIE['church_id'];
    // $stmt = (new Connection)->connect()->prepare("SELECT collabdate FROM churchcollab WHERE churchid1 = :churchid1 AND ");
    // $stmt->bindParam(":churchid1", $churchID, PDO::PARAM_STR);
    // $stmt->execute();
    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // $stmt->closeCursor(); // Close the cursor to free up resources
    // return $result;

}





}
?>