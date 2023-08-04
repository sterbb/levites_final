<?php
require_once "connection.php";

class LandingPageModel
{
    public function getActiveUsers()
    {
        $church_name = $query . '%';

        $stmt = (new Connection)->connect()->prepare("SELECT church_name, church_city, church_address FROM churches WHERE church_name LIKE :query");
        $stmt->bindParam(':query', $church_name, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalUsers()
    {

        $stmt = (new Connection)->connect()->prepare("SELECT AccountID FROM account WHERE verify_status = 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getChurches()
    {

        $stmt = (new Connection)->connect()->prepare("SELECT churchID FROM churches WHERE church_status = 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCollaboration()
    {

        $stmt = (new Connection)->connect()->prepare("SELECT collabID FROM churchcollab WHERE collab_status = 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
}
?>
