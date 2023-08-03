<?php 
require_once "../controllers/collaboration.controller.php";
require_once "../models/collaboration.model.php";

class getMemberReport {
    
    public function getMemReport() {
         $data = (new CollaborationController)->ctrMemberReport();
        echo json_encode($data);
    }
    
}


$reportMember = new getMemberReport();

$reportMember->getMemReport();


?>