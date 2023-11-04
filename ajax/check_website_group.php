<?php
require_once "../controllers/website.controller.php";
require_once "../models/website.model.php";

class checkgroupWebsite{

    public $website_groupname;


    public function websiteGroupCheck(){
      $website_groupname = $this->website_groupname;

       $data = array( "website_groupname"=> $website_groupname);
       return $answer = (new ControllerWebsite)->checkWebsiteGroup($data);

    }
}
 

$ChecksgWebsite = new checkgroupWebsite();
$ChecksgWebsite -> website_groupname = $_POST["website_groupname"];


$ChecksgWebsite -> websiteGroupCheck();
