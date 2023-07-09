<?php
require_once "../controllers/calendar.controller.php";
require_once "../models/calendar.model.php";

class AddEventGroup{

    public $group_name;
    public $group_members;
    public $members_email;

    public function addGroup(){
      $group_name = $this->group_name;
      $group_members = $this->group_members;
      $members_email = $this->members_email;

       $data = array("group_name"=> $group_name,
       "group_members"=> $group_members,
       "members_email"=> $members_email,);
       return $answer = (new ControllerCalendar)->ctrAddGroup($data);

    }

    
}
 

$addGroup = new AddEventGroup();

$addGroup -> group_name = $_POST["group_name"];
$addGroup -> group_members = $_POST["group_members"];
$addGroup -> members_email = $_POST["members_email"];


$addGroup -> addGroup();
