<?php
require_once "connection.php";

class ModelReport
{
    public function mdlShowEventReport($data)
    {
        // $church_name = $query . '%';

        $churchID = $_COOKIE['church_id'];

        $stmt = (new Connection)->connect()->prepare("SELECT * FROM calendar WHERE churchID = :churchID AND event_date = :event_date");
        $stmt->bindParam(':churchID', $churchID, PDO::PARAM_STR);
        $stmt->bindParam(':event_date', $data['date1'], PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
