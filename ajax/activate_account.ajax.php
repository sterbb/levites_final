<?php
require_once "../controllers/superuser.controller.php";
require_once "../models/superuser.model.php";

class ActivateAccount{

    public $church_id;

    public function activateAccount(){

      $church_id = $this->church_id;


       $data = array("church_id"=> $church_id);
       return $answer = (new ControllerSuperuser)->ctrActivateAccount($data);

    }
}
 

$deactivate = new ActivateAccount();

$deactivate -> church_id = $_POST["church_id"];

$deactivate -> activateAccount();