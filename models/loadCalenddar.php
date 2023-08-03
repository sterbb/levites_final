<?php
require_once "connection.php";

$churchID = $_COOKIE["church_id"];

$data = array();

$stmt = (new Connection)->connect()->prepare("SELECT * FROM calendar WHERE churchID = :churchID");
$stmt->bindParam(":churchID", $churchID, PDO::PARAM_STR);
$stmt -> execute();
$result = $stmt -> fetchAll();

foreach($result as $row){
    $data[] = array(
        "title" => $row["event_title"],
        "start" => $row["event_date"],
        "classNames" => [$row["event_category"]],   
    );
}


echo json_encode($data);

