<?php
require_once "../controllers/website.controller.php";
require_once "../models/website.model.php";
class DeleteWebsite{

    public $church_id;
    public function deleteWebsite(){

        $w_id = $this->w_id;
      $w_name = $this->w_name;

       $data = array("w_id"=> $w_id,
       "w_name"=> $w_name);
       $answer = (new ControllerWebsite)->ctrdeleteWebsite($data);
      
    }
}
 

  $delete = new DeleteWebsite();
  $delete -> w_id = $_POST["w_id"];
  $delete -> w_name = $_POST["w_name"];
  $delete -> deleteWebsite();
