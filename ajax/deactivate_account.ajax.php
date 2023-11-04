<?php
require_once "../controllers/superuser.controller.php";
require_once "../models/superuser.model.php";

class DeactivateAccount{

    public $church_id;

    public function deactivateAccount(){

      $church_id = $this->church_id;


       $data = array("church_id"=> $church_id);
       return $answer = (new ControllerSuperuser)->ctrDeactivateAccount($data);

    }
}
 

$deactivate = new DeactivateAccount();

$deactivate -> church_id = $_POST["church_id"];

$deactivate -> deactivateAccount();