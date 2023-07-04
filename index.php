<?php

//require_once "controllers/login.controller.php";
require_once "controllers/template.controller.php";

require_once "controllers/superuser.controller.php";
// require_once "controllers/login.controller.php";
require_once "controllers/website.controller.php";

require_once "models/superuser.model.php";
// require_once "models/login.model.php";
require_once "models/website.model.php";


require 'extensions/PHPMailer/src/Exception.php';
require 'extensions/PHPMailer/src/PHPMailer.php';
require 'extensions/PHPMailer/src/SMTP.php';

// login para sa startsession


$template = new ControllerTemplate();
$template -> ctrTemplate();