<?php
require_once "connection.php";

$churchID = $_COOKIE["church_id"];

$data = array();

$stmt = (new Connection)->connect()->prepare("SELECT * FROM calendar WHERE churchID = :churchID");
$stmt->bindParam(":churchID", $churchID, PDO::PARAM_STR);
$stmt -> execute();
$result = $stmt -> fetchAll();

foreach ($result as $row) {
    $event = array(
        "title" => $row["event_title"],
        "classNames" => [$row["event_category"]]
    );

    if ($row["event_date"]) {
        $event["start"] = $row["event_date"];
        $event["borderColor"] = 'white';
        if ($row["event_date2"] && $row["event_date2"] !== $row["event_date"]) {
            $eventEndDate = new DateTime($row["event_date2"]);
            $eventEndDate->modify('+1 day'); // Add one day to the end date
            $event["end"] = $eventEndDate->format('Y-m-d');
        }
    }

    $data[] = $event;
}


echo json_encode($data);

