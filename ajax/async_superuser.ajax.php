<?php
require_once "../controllers/superuser.controller.php";
require_once "../models/superuser.model.php";

class AsyncSuperuser{

    public $superuser_function;
    public $data1;

    public function SuperuserFunction(){
      $superuser_function = $this->superuser_function;
      $data1 = $this->data1;

      if($superuser_function == "admin_details"){
         $answer =  (new ControllerSuperuser)->ctrGetChurchDetailsOnly($data1);
         echo json_encode($answer);
        }else if($superuser_function == "approve"){
          $answer =  (new ControllerSuperuser)->ctrShowChurchList(0);
          echo json_encode($answer);
         }else if($superuser_function == "rejected"){
          $answer =  (new ControllerSuperuser)->ctrShowRejectedChurches(0);
          echo json_encode($answer);
         }else if($superuser_function == "accepted"){
          $answer =  (new ControllerSuperuser)->ctrShowChurchList(1);
          echo json_encode($answer);
         }else if($superuser_function == "deactivated"){
          $answer =  (new ControllerSuperuser)->ctrShowDeactivatedChurch();
          echo json_encode($answer);
         }
        // else if($collab_section == "church_collab"){
        // $answer = (new CollaborationController)->ctrshowRequests();
        // echo json_encode($answer);
        // }
      // else if($websitefunction == "website_group"){
      //   $answer = (new ControllerWebsite)->ctrShowGroups();
      //   echo json_encode($answer);
      // }
      
    }

    
}
 

$superuser = new AsyncSuperuser();

$superuser -> superuser_function = $_POST["superuser_function"];

$superuser -> data1 = $_POST["data1"];

$superuser -> SuperuserFunction();
