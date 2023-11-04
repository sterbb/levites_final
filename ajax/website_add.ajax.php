<?php
require_once "../controllers/website.controller.php";
require_once "../models/website.model.php";

class AddWebsite{

    public $website_path;
    public $website_name;
    public $website_category;
    public $website_desc;


    public function addNewWebsite(){
      $website_category = $this->website_category;
      $website_path = $this->website_path;
      $website_name = $this->website_name;
      $website_desc = $this->website_desc;


       $data = array("website_category"=> $website_category,
        "website_path"=> $website_path,
       "website_name"=> $website_name,
       "website_desc"=> $website_desc);
       return $answer = (new ControllerWebsite)->ctrAddWebsite($data);

    }
}
 

$addWebsite = new AddWebsite();
$addWebsite -> website_path = $_POST["website_path"];
$addWebsite -> website_name = $_POST["website_name"];
$addWebsite -> website_category = $_POST["website_category"];
$addWebsite -> website_desc = $_POST["website_desc"];



$addWebsite -> addNewWebsite();
