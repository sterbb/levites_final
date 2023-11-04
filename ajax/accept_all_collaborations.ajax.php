<?php
require_once "../controllers/collaboration.controller.php";
require_once "../models/collaboration.model.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "Reached here";
    $dataArray = json_decode($_POST["dataArray"], true);

    foreach ($dataArray as $data) {
        $collabID = $data["collabID"];
        $churchID = $data["churchID"];
        $church_name = $data["church_name"];

        $data = array(
            "collabID" => $collabID,
            "churchID" => $churchID,
            "church_name" => $church_name
        );

        $answer = (new CollaborationController)->ctrAcceptCollab($data);

        // You might want to handle $answer if needed
        // For example, you can accumulate results or check for errors
    }

    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
}
