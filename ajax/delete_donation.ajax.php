<?php

require_once "../controllers/churchsetting.controller.php";
require_once "../models/churchsetting.model.php";

class deleteDonation {
    public function DeleteDon() {
        $result = (new ControllerChurchSetting)->ctrDeleteDonation();
        echo json_encode($result);
    }
}

$deleteDon = new deleteDonation();

$deleteDon->DeleteDon();

?>
