<?php
require_once "connection.php";


class ModelNotifications{


    public function mdlGetCollaborationNotif()
    {
        $churchID =  $_COOKIE['church_id'];

        $stmt = (new Connection)->connect()->prepare("SELECT * FROM notifications WHERE recipientID = :recipientID");   
        $stmt->bindParam(':recipientID', $churchID, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function mdlGetCollaborationNotifPublic()
    {
        $churchID =  $_COOKIE['acc_id'];

        $stmt = (new Connection)->connect()->prepare("SELECT * FROM notifications WHERE recipientID = :recipientID");   
        $stmt->bindParam(':recipientID', $churchID, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }




}


?>