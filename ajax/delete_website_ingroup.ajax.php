<?php
require_once "../controllers/website.controller.php";
require_once "../models/website.model.php";
class DeleteWebsite{


    public function deleteWebsite(){

        $group_id = $this->group_id;
      $w_name = $this->w_name;
      $group_name = $this->group_name;
      

       $data = array("group_id"=> $group_id,
       "group_name"=> $group_name,
       "w_name"=> $w_name);
       $answer = (new ControllerWebsite)->ctrdeleteWebsiteInGroup($data);
      
    }
}
 

  $delete = new DeleteWebsite();
  $delete -> group_id = $_POST["group_id"];
  $delete -> w_name = $_POST["w_name"];
  $delete -> group_name = $_POST["group_name"];
  $delete -> deleteWebsite();
