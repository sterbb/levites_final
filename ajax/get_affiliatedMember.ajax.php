<?php 
require_once "../controllers/collaboration.controller.php";
require_once "../models/collaboration.model.php";

class getAffiliatedMem {


    public function getAffilReport() {
        $data = (new CollaborationController)->ctrTotalAffiliated();
        echo json_encode($data);
        
        
        
    }
    
}


$affilReport = new getAffiliatedMem();

$affilReport->getAffilReport();


?>