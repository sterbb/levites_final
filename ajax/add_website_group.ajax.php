<?php
require_once "../controllers/website.controller.php";
require_once "../models/website.model.php";

class AddWebsiteGroup{

    public $website_groupname;
    public $website_list;

    public function addGroup(){
      $website_groupname = $this->website_groupname;
      $website_list = $this->website_list;

       $data = array("website_groupname"=> $website_groupname,
       "website_list"=> $website_list);
       return $answer = (new ControllerWebsite)->ctrAddGroup($data);

    }

    
}
 

$addGroup = new AddWebsiteGroup();

$addGroup -> website_groupname = $_POST["website_groupname"];
$addGroup -> website_list = $_POST["website_list"];

$addGroup -> addGroup();
