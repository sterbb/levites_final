<?php
require_once "../models/image.model.php";

class AsyncImage{

    public $image_purpose;
    public $data1;
    public $data2;

    public function ImageLocation(){
      $image_purpose = $this->image_purpose;
      $data1 = $this->data1;
      $data2 = $this->data2;


      if($image_purpose == "request"){
         $answer =  (new ImageModel)->Request($data1);
         echo json_encode($answer);
       }else if($image_purpose == "public"){
        $answer =  (new ImageModel)->RequestPublic($data1);
        echo json_encode($answer);
      }
      // else if($websitefunction == "website_group"){
      //   $answer = (new ControllerWebsite)->ctrShowGroups();
      //   echo json_encode($answer);
      // }
      
    }

    
}
 

$image = new AsyncImage();

$image -> image_purpose = $_POST["image_purpose"];

$image -> data1 = $_POST["data1"];

$image -> data2 = $_POST["data2"];


$image -> ImageLocation();
