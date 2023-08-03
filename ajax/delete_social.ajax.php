<?php

require_once "../controllers/churchsetting.controller.php";
require_once "../models/churchsetting.model.php";

class deleteSocial {
    public function DeleteSocial() {
        $result = (new ControllerChurchSetting)->ctrDeleteSocial();
        echo json_encode($result);
    }
}

$deleteSoc = new deleteSocial();

$deleteSoc->DeleteSocial();

?>
