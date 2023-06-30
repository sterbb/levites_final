<?php
require_once "connection.php";

// require '../extensions/PHPMailer-master/src/Exception.php';
// require '../extensions/PHPMailer-master/src/PHPMailer.php';
// require '../extensions/PHPMailer-master/src/SMTP.php';


// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

class ModelSuperUser{

    public static function mdlShowChurchList($data){
        

        $stmt = (new Connection)->connect()->prepare("SELECT * FROM churches WHERE church_status = :church_status ORDER BY church_name");
        $stmt->bindParam(":church_status", $data, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
	
    }

}

?>