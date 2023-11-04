<?php
require_once "../controllers/collaboration.controller.php";
require_once "../models/collaboration.model.php";

if (isset($_POST["dataArray"])) {
    $dataArray = json_decode($_POST["dataArray"], true);

    // Loop through each collaboration data and reject it
    foreach ($dataArray as $collaborationData) {
        $collabID = $collaborationData["collabID"];
        $churchID = $collaborationData["churchID"];
        $church_name = $collaborationData["church_name"];

        // Reject the collaboration using your existing logic
        $data = array(
            "collabID" => $collabID,
            "churchID" => $churchID,
            "church_name" => $church_name
        );

        $answer = (new CollaborationController)->ctrRejectCollab($data);
    }

    // Respond with a success message or other appropriate response
    echo json_encode(["success" => true]);
} else {
    // Handle the case where "dataArray" is not provided in the POST request
    echo json_encode(["success" => false, "error" => "Missing data"]);
}
?>
