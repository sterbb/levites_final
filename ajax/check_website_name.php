<?php
require_once "../controllers/website.controller.php";
require_once "../models/website.model.php";

class checkWebsite{

    public $website_name;


    public function websiteCheck(){
      $website_name = $this->website_name;

       $data = array( "website_name"=> $website_name);
       return $answer = (new ControllerWebsite)->checkWebsiteName($data);

    }
}
 

$ChecksWebsite = new checkWebsite();
$ChecksWebsite -> website_name = $_POST["website_name"];


$ChecksWebsite -> websiteCheck();
