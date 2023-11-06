<?php
require_once "../controllers/superuser.controller.php";
require_once "../models/superuser.model.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "Reached here";
    $dataArray = json_decode($_POST["dataArray"], true);

    foreach ($dataArray as $data) {
        $church_id = $data["church_id"];
        $church_name = $data["church_name"];

        $data = array(
            "church_id" => $church_id,
            "church_name" => $church_name
        );

        $answer = (new ControllerSuperuser)->ctrAcceptChurch($data);

        // You might want to handle $answer if needed
        // For example, you can accumulate results or check for errors
    }

    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
}
