<?php
require_once "../controllers/churchsetting.controller.php";
require_once "../models/churchsetting.model.php";

class AddDonation{
class AddDonation{

    public $donation_category;
    public $donation_number;
    

    public function addDonation(){
      $donation_number = $this->donation_number;
      $donation_category = $this->donation_category;

       $data = array("donation_number"=> $donation_number,
       "donation_category"=> $donation_category);
       return $answer = (new CollaborationController)->ctrAddDonation($data);

    }

    
}
 

$addDonation = new AddDonation();

$addDonation -> donation_number = $_POST["donation_number"];
$addDonation -> donation_category = $_POST["donation_category"];

$addDonation -> addDonation();
