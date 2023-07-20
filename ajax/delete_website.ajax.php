<?php
require_once "../controllers/website.controller.php";
require_once "../models/website.model.php";
class eleteWebsite{

    public $id;
    public function deleteWeb(){
      $id = $this->id;

       $data = array("id" => $id);
       $answer = (new ControllerWebsite)->ctrDeletewebsite($id);
       echo json_encode($answer);
      
    }
}
 

  $deleteWebsite = new ChurchDetails();
  $deleteWebsite -> id = $_POST["id"];
  $deleteWebsite -> deleteWeb();
