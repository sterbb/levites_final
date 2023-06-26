<?php
require_once "../controllers/login.controller.php";
require_once "../models/login.model.php";
class AjaxLogin{
    public $login_username;
    public $login_password;
    public function ajaxgetAccount(){
      $login_username = $this->login_username;
      $login_password = $this->login_password;

      $data = array("login_username"=> $login_username,
                    "login_password"=>$login_password);
      return $answer = (new ControllerLogin)->ctrAuthenticateLogin($data);

      
    }
}
 

  $getAccount = new AjaxLogin();
  $getAccount -> login_username = $_POST["login_username"];
  $getAccount -> login_password = $_POST["login_password"];
  $getAccount -> ajaxgetAccount();
