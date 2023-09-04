<?php
require_once "connection.php";


class ModelMembership{


    public function mdlGetPendingMembership()
    {
        $accID =  $_COOKIE['acc_id'];
        $status =  1;

        $stmt = (new Connection)->connect()->prepare("SELECT * FROM membership WHERE memberID = :memberID AND membership_status = 0");   
        $stmt->bindParam(':memberID', $accID, PDO::PARAM_STR);
        // $stmt->bindParam(':recipientID', $churchID, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function mdlGetAcceptedMembership()
    {
        $accID =  $_COOKIE['acc_id'];
        $status =  1;

        $stmt = (new Connection)->connect()->prepare("SELECT * FROM membership WHERE memberID = :memberID AND membership_status = 1");   
        $stmt->bindParam(':memberID', $accID, PDO::PARAM_STR);
        // $stmt->bindParam(':recipientID', $churchID, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function mdlcancelMembership($data)
    {
        $cancel = 1;
        $status = 0;
        $membershipDate = date('Y-m-d');

        $stmt = (new Connection)->connect()->prepare("UPDATE membership SET canmship_status = :canmship_status, membership_status = :membership_status, rejmship_status = :rejmship_status, membershipDate =:membershipDate WHERE mshipID = :mshipID ");
        $stmt->bindParam(":mshipID", $data['membershipID'], PDO::PARAM_STR);
        $stmt->bindParam(":membershipDate", $membershipDate, PDO::PARAM_STR);
        $stmt->bindParam(":canmship_status", $cancel, PDO::PARAM_INT);
        $stmt->bindParam(":membership_status", $status, PDO::PARAM_INT);
        $stmt->bindParam(":rejmship_status", $status, PDO::PARAM_INT);
        $stmt -> execute();
        $stmt = null;	
    
    }

}


?>