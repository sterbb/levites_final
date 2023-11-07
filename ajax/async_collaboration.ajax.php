<?php
require_once "../controllers/collaboration.controller.php";
require_once "../models/collaboration.model.php";

class AsyncCollab{

    public $collab_section;

    public function CollabFunction(){
      $collab_section = $this->collab_section;

      if($collab_section == "request"){
         $answer =  (new CollaborationController)->ctrshowPendingRequest();
         echo json_encode($answer);
       }else if($collab_section == "church_collab"){
        $answer = (new CollaborationController)->ctrshowRequests();
        echo json_encode($answer);
      }else if($collab_section == "reject_collab"){
        $answer = (new CollaborationController)->ctrshowRejected();
        echo json_encode($answer);
      }else if($collab_section == "accepted_collab"){
        $answer = (new CollaborationController)->ctrshowAffilatedChurches();
        echo json_encode($answer);
      }else if($collab_section == "membership_request"){
        $answer =  (new CollaborationController)->ctrshowMembership();
        echo json_encode($answer);
      }else if($collab_section == "members"){
        $answer =  (new CollaborationController)->ctrshowAffilatedMember();
        echo json_encode($answer);
      }else if($collab_section == "reject_membership"){
        $answer =  (new CollaborationController)->ctrRejectMembership();
        echo json_encode($answer);
      }

      

     

      // else if($websitefunction == "website_group"){
      //   $answer = (new ControllerWebsite)->ctrShowGroups();
      //   echo json_encode($answer);
      // }
      
    }

    
}
 

$collab = new AsyncCollab();

$collab -> collab_section = $_POST["collab_section"];

$collab -> CollabFunction();
