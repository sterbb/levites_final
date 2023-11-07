<?php
require_once "connection.php";

class ImageModel

{
    public function Request($query)
    {
        $db = new Connection();
        $pdo = $db->connect();
        $stmt = $pdo->prepare("SELECT Avatar FROM churches WHERE churchID = :churchID");
        $stmt->bindParam(':churchID', $query, PDO::PARAM_STR);
        $stmt->execute();
        return $profile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the profile data
        
    }

    public function RequestPublic($query)
    {
        $db = new Connection();
        $pdo = $db->connect();
        $stmt = $pdo->prepare("SELECT Avatar FROM account WHERE AccountID = :AccountID");
        $stmt->bindParam(':AccountID', $query, PDO::PARAM_STR);
        $stmt->execute();
         return $Memprofile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the profile data
        
    }

    
}
?>
