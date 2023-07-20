<?php
require_once "../controllers/website.controller.php";
require_once "../models/website.model.php";
class DeleteGroup{

    public $church_id;
    public function deleteGroup(){

        $group_id = $this->group_id;
        $group_name = $this->group_name;

        

       $data = array("group_id"=> $group_id,
       "group_name"=> $group_name);
       $answer = (new ControllerWebsite)->ctrdeleteWebsiteGroup($data);
      
    }
}
 

  $delete = new DeleteGroup();
  $delete -> group_id = $_POST["group_id"];
  $delete -> group_name = $_POST["group_name"];
  $delete -> deleteGroup();
