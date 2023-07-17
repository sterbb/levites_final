<?php
require_once "../controllers/publichomepage.controller.php";
require_once "../models/publichomepage.model.php";

class addCollaboration{

    public $churchName;

    public function searchChurch(){
      $churchName = $this->churchName;

       $data = array("churchName"=> $churchName);
        $answer = (new CollaborationController)->searchChurches($data);
       echo json_encode($answer);

    }

    
}
 

$addCollab = new addCollaboration();

$addCollab->churchName = $_POST["churchName"];

$result = $addCollab->searchChurch();
