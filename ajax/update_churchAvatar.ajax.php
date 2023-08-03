<?php
require_once "../controllers/churchsetting.controller.php";
require_once "../models/churchsetting.model.php";

class AddImages {

    // if(isset($_FILES["fileImg"]["name"])){

    //     $id = $_POST["id"]
    
    //     $src = 	$_FILES["fileImg"]["tmp_name"];
    
    //     $imageName = uniqid() . $_FILES["fileImg"]["name"];
    
    
    //     $target = "img/" . $imageName;
    
    //     move_uploaded_file($src, $target)
            
    // }


    public $UserAvatar;
    // public $userBackFile;

    public function ImageAdd() {
        $UserAvatar = $this->UserAvatar;
        // $userBackFile = $this->userBackFile;

        $data = array(
            "UserAvatar" => $UserAvatar
            // "userBackFile" => $userBackFile
        );

        return $answer = (new ControllerChurchSetting)->ctrAddChurchImages($data);
    }
}



$addImages = new AddImages();

$addImages->UserAvatar =  $_POST["UserAvatar"];
// $addImages->userBackFile =  $_FILES["userBackFile"];


$addImages->ImageAdd();


?>
