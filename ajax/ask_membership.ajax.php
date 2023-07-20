<?php
require_once "../controllers/collaboration.controller.php";
require_once "../models/collaboration.model.php";

class AddMembership{

    public $memChurchID;
    public $memChurchName;

    public function addChurchMembership(){

      $memChurchID = $this->memChurchID;
      $memChurchName = $this->memChurchName;

       $data = array("memChurchID"=> $memChurchID,
       "memChurchName"=> $memChurchName);
       return $answer = (new CollaborationController)->ctraddMembership($data);

    }
}
 

$churchMembership = new AddMembership();

$churchMembership -> memChurchID = $_POST["memChurchID"];
$churchMembership -> memChurchName = $_POST["memChurchName"];

$churchMembership -> addChurchMembership();