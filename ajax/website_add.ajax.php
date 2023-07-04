<?php
require_once "../controllers/website.controller.php";
require_once "../models/website.model.php";

class AddWebsite{

    public $website_path;
    public $website_name;

    public function addWebsite(){
      $website_path = $this->website_path;
      $website_name = $this->website_name;

       $data = array("website_path"=> $website_path,
       "website_name"=> $website_name);
       return $answer = (new ControllerWebsite)->ctrAddWebsite($data);

    }
}
 

$addWebsite = new AddWebsite();
$addWebsite -> website_path = $_POST["website_path"];
$addWebsite -> website_name = $_POST["website_name"];

$addWebsite -> addWebsite();
