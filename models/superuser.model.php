<?php
require_once "connection.php";

// require '../extensions/PHPMailer-master/src/Exception.php';
// require '../extensions/PHPMailer-master/src/PHPMailer.php';
// require '../extensions/PHPMailer-master/src/SMTP.php';


// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

class ModelSuperUser{

    public static function mdlShowChurchList($data){
        
        $rejected_status = 0;
        $stmt = (new Connection)->connect()->prepare("SELECT * FROM churches WHERE church_status = :church_status AND rejected_status = :rejected_status ORDER BY church_name");
        $stmt->bindParam(":church_status", $data, PDO::PARAM_INT);
        $stmt->bindParam(":rejected_status", $rejected_status, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
	
    }

    public static function mdlShowChurchList1($data){
        
        $rejected_status = 0;
        $stmt = (new Connection)->connect()->prepare("SELECT * FROM churches WHERE church_status = :church_status AND rejected_status = :rejected_status ORDER BY church_name");
        $stmt->bindParam(":church_status", $data, PDO::PARAM_INT);
        $stmt->bindParam(":rejected_status", $rejected_status, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
	
    }




    public static function mdlGetChurchDetails($data){
        

        $stmt = (new Connection)->connect()->prepare("SELECT churchID, church_name, church_email, church_num, church_address, church_city, religion FROM churches WHERE churchID = :churchID ");
        $stmt->bindParam(":churchID", $data['church_id'], PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;	
	
    }


    public static function mdlAcceptChurch($data){

        $accept = 1;

        $stmt = (new Connection)->connect()->prepare("UPDATE churches SET church_status = :church_status WHERE churchID = :churchID ");
        $stmt->bindParam(":churchID", $data['church_id'], PDO::PARAM_STR);
        $stmt->bindParam(":church_status", $accept, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;	
	
    }

    
    public static function mdlRejectChurch($data){

        $reject = 1;

        $stmt = (new Connection)->connect()->prepare("UPDATE churches SET rejected_status = :rejected_status WHERE churchID = :churchID ");
        $stmt->bindParam(":churchID", $data['church_id'], PDO::PARAM_STR);
        $stmt->bindParam(":rejected_status", $reject, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;	
	
    }




    //todo
    public static function mdlAcceptAllChurch($data){

        $accept = 1;

        $stmt = (new Connection)->connect()->prepare("UPDATE churches SET church_status = :church_status WHERE churchID = :churchID ");
        $stmt->bindParam(":churchID", $data['church_id'], PDO::PARAM_STR);
        $stmt->bindParam(":church_status", $accept, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;	
	
    }

    public static function mdlAcceptAllChurch1($data){

        $accept = 1;

        $stmt = (new Connection)->connect()->prepare("UPDATE churches SET church_status = :church_status WHERE churchID = :churchID ");
        $stmt->bindParam(":churchID", $data['church_id'], PDO::PARAM_STR);
        $stmt->bindParam(":church_status", $accept, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;	
	
    }





    

}

?>