<?php
require_once "../controllers/superuser.controller.php";
require_once "../models/superuser.model.php";

class checkDeactivation{

    public function checkAccount(){
        $answer = (new ControllerSuperuser)->ctrShowDeactivated();
        echo json_encode($answer);
    }
}
 

$check = new checkDeactivation();

$check -> checkAccount();
