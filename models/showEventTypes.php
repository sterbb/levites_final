<?php
require_once "connection.php";


$churchID = $_COOKIE['church_id'];

$stmt = (new Connection)->connect()->prepare("SELECT * FROM eventtype WHERE churchID = :churchID");
$stmt->bindParam(":churchID", $churchID, PDO::PARAM_STR);
$stmt -> execute();

$events =  $stmt->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
echo json_encode($events);







?>
