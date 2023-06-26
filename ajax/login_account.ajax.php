<?php
session_start();
class AjaxLogin{
    public $username;
    public function ajaxgetAccount(){
      $username = $this->username;

      echo ($username);
    }
}
 
if(isset($_POST["username"])){
  $getAccount = new AjaxLogin();
  $getAccount -> username = $_POST["username"];
  $getAccount -> ajaxgetAccount();
  $_SESSION["account_type"] = $_POST["username"];
}