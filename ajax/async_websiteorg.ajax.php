<?php
require_once "../controllers/website.controller.php";
require_once "../models/website.model.php";

class AsyncWebsite{

    public $websitefunction;

    public function websiteFunction(){
      $websitefunction = $this->websitefunction;

      if($websitefunction == "website_list"){
         $answer = (new ControllerWebsite)->ctrShowWebsites();
         echo json_encode($answer);
      }else if($websitefunction == "website_group"){
        $answer = (new ControllerWebsite)->ctrShowGroups();
        echo json_encode($answer);
      }
      
    }

    
}
 

$website = new AsyncWebsite();

$website -> websitefunction = $_POST["websitefunction"];

$website -> websiteFunction();
