<?php
require_once "../controllers/collaboration.controller.php";
require_once "../models/collaboration.model.php";

class AddCollaboration{

    public $churchName;
    public $churchid2;
    public function addChurchCollaboration(){
      $churchName = $this->churchName;

      $churchid2 = $this->churchid2;

       $data = array("churchName"=> $churchName,
       "churchid2"=> $churchid2);
       return $answer = (new CollaborationController)->ctraddCollaboration($data);

    }

    
}
 

$churchCollab = new AddCollaboration();

$churchCollab -> churchName = $_POST["churchName"];
$churchCollab -> churchid2 = $_POST["churchid2"];

$churchCollab -> addChurchCollaboration();
