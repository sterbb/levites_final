<?php
require_once "../controllers/website.controller.php";
require_once "../models/website.model.php";

class checkupdateWebsite{

    public $newgroupname;


    public function websiteUpdateCheck(){
      $newgroupname = $this->newgroupname;

       $data = array( "newgroupname"=> $newgroupname);
       return $answer = (new ControllerWebsite)->checkWebsiteUpdate($data);

    }
}
 

$ChecksuWebsite = new checkupdateWebsite();
$ChecksuWebsite -> newgroupname = $_POST["newgroupname"];


$ChecksuWebsite -> websiteUpdateCheck();
