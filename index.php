<?php

//require_once "controllers/login.controller.php";
require_once "controllers/template.controller.php";

require_once "controllers/superuser.controller.php";
// require_once "controllers/login.controller.php";

require_once "controllers/website.controller.php";
// require_once "controllers/calendar.controller.php";

require_once "controllers/playlist.controller.php";
// require_once "controllers/calendar.controller.php";

require_once "controllers/account.controller.php";
// require_once "controllers/account.controller.php";

require_once "controllers/playlist.controller.php";
// require_once "controllers/playlist.controller.php";


require_once "controllers/churchAdmin.controller.php";
// require_once "controllers/churchAdmin.controller.php";

require_once "controllers/churchsetting.controller.php";
// require_once "controllers/churchsetting.controller.php";
require_once "controllers/collaboration.controller.php";

require_once "models/collaboration.model.php";


require_once "models/churchsetting.model.php";
// require_once "models/churchsetting.model.php";



require_once "models/playlist.model.php";
// require_once "models/palylist.model.php";

require_once "models/account.model.php";
// require_once "models/account.model.php";

require_once "models/churchAdmin.model.php";
// require_once "models/churchAdmin.model.php";



require_once "models/superuser.model.php";
// require_once "models/login.model.php";
require_once "models/website.model.php";
// require_once "models/calendar.model.php";







require 'extensions/PHPMailer/src/Exception.php';
require 'extensions/PHPMailer/src/PHPMailer.php';
require 'extensions/PHPMailer/src/SMTP.php';

// login para sa startsession


$template = new ControllerTemplate();
$template -> ctrTemplate();