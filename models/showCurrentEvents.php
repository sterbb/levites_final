<?php
require_once "connection.php";


$churchID = $_COOKIE['church_id'];
// $currentDate = date('Y-m-d');

$currentDate = date("Y-m-d"); 

$stmt = (new Connection)->connect()->prepare("SELECT * FROM calendar WHERE churchID = :churchID  AND event_date = :event_date");
$stmt->bindParam(':churchID', $churchID, PDO::PARAM_STR);
$stmt->bindParam(':event_date', $currentDate, PDO::PARAM_STR);
$stmt->execute();

$events =  $stmt->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
echo json_encode($events);


?>
