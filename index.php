<?php

require_once "controllers/template.controller.php";
require_once "controllers/registration.controller.php";

require_once "controllers/login.controller.php";


require_once "models/login.model.php";


require 'extensions/PHPMailer-master/src/Exception.php';
require 'extensions/PHPMailer-master/src/PHPMailer.php';
require 'extensions/PHPMailer-master/src/SMTP.php';

$template = new ControllerTemplate();
$template -> ctrTemplate();