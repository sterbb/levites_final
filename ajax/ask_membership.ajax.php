<?php
require_once "../controllers/collaboration.controller.php";
require_once "../models/collaboration.model.php";

class AddMembership{

    public $memChurchID;
    public $memChurchName;
    public $city;
    public $province;

    public function addChurchMembership(){

      $memChurchID = $this->memChurchID;
      $memChurchName = $this->memChurchName;
      $city = $this->city;
      $province = $this->province;

       $data = array("memChurchID"=> $memChurchID,
       "memChurchName"=> $memChurchName,
       "city"=> $city,
       "province"=> $province);
       return $answer = (new CollaborationController)->ctraddMembership($data);

    }
}
 

$churchMembership = new AddMembership();

$churchMembership -> memChurchID = $_POST["memChurchID"];
$churchMembership -> memChurchName = $_POST["memChurchName"];
$churchMembership -> city = $_POST["city"];
$churchMembership -> province = $_POST["province"];

$churchMembership -> addChurchMembership();