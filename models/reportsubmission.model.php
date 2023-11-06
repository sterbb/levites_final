<?php
require_once "connection.php";

class ModelReportSubmission
{
    public function mdlSubmitReport($data)
    {
        $db = new Connection();
        $pdo = $db->connect();
        $accID = $_COOKIE["acc_id"];
        $churchID = $_COOKIE["church_id"];
        
        
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

            $current_year = substr(date('Y'), -2 );
            $current_month = date('n');

            $currentMon = date("Y-m-d"); 

            
            $report_id = (new Connection)->connect()->prepare("SELECT CONCAT('R', LPAD((count(id)+1),4,'0'), '$current_month','$current_year') as report_id  FROM reports FOR UPDATE");
            $report_id->execute();
            $reportID = $report_id -> fetchAll(PDO::FETCH_ASSOC);
            
            
            $stmt = $pdo->prepare("INSERT INTO reports (reportID, memID, churchID, violation_type, violation, violation_description)
            VALUES (:reportID, :memID, :churchID, :violation_type, :violation, :violation_description)");

            // $stmt = $pdo->prepare("INSERT INTO register (AccountID,acc_username,acc_password,acc_email,acc_type,fname,lname,designation,acc_contact,religion,verify_token,created_at) 
            // VALUES (:AccountID,:acc_username,:acc_password,:acc_email,:acc_type,:fname,:lname,:designation,:acc_contact,:religion,:verify_token,:created_at)");

            $stmt->bindParam(":memID", $accID, PDO::PARAM_STR);
            $stmt->bindParam(":reportID", $reportID[0]['report_id'], PDO::PARAM_STR);
            $stmt->bindParam(":churchID", $data['report_account'], PDO::PARAM_STR);
            
            $stmt->bindParam(":violation_type", $data["report_type"], PDO::PARAM_STR);
            $stmt->bindParam(":violation", $data["report_subject"], PDO::PARAM_STR);
            $stmt->bindParam(":violation_description", $data["report_description"], PDO::PARAM_STR);

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

        public function mdlgetSubmissions($choice)
        {
            if($choice == 1){
                $statement = "WHERE violation_type = 'Inappropriate Content' OR violation_type = 'Offensive Language' OR violation_type = 'Hate Speech'";
            }else{
                $statement = "WHERE violation_type = 'Feedback' OR violation_type = 'Bug Report' ";
            }
            $status = 0;
            $stmt = (new Connection)->connect()->prepare("SELECT * FROM reports $statement AND display_status = 1");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdlReportDetails($data)
        {

            $stmt = (new Connection)->connect()->prepare("SELECT * FROM reports WHERE reportID = :reportID");
            $stmt->bindParam(":reportID", $data['report_id'], PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function mdlWarnedAccounts()
        {
            $warning = "Warning";
            $stmt = (new Connection)->connect()->prepare("SELECT * FROM notifications WHERE notification_type = :notification_type");
            $stmt->bindParam(":notification_type", $warning, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdldeleteReport($data)
        {
            $stmt = (new Connection)->connect()->prepare("DELETE FROM reports WHERE reportID = :reportID");
            $stmt->bindParam(":reportID", $data['report_id'], PDO::PARAM_STR);
            $stmt->execute();
        }

        public function mdldeleteWarningReport($data)
        {
            $stmt = (new Connection)->connect()->prepare("DELETE FROM notifications WHERE recipientID = :recipientID AND notification_type = 'Warning' ");
            $stmt->bindParam(":recipientID", $data['report_id'], PDO::PARAM_STR);
            $stmt->execute();
        }

    






    





}
?>
