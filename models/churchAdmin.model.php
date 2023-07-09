<?php
require_once "connection.php";

class ModelAdmin{

public static function mdlShowChurchAdmin(){
        
        $accID = $_COOKIE["acc_id"];
        $stmt = (new Connection)->connect()->prepare("SELECT * FROM churches WHERE accID = :accID");
        $stmt->bindParam(":accID", $accID, PDO::PARAM_STR);
		$stmt -> execute();
        return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
        // setcookie("church_name", $church_ID, time() + (86400 * 30), "/"); // 86400 = 1 day

	
    }
    public static function mdlShowChurchAccount(){
        
        $NewaccID = $_COOKIE["acc_id"];
        $stmt = (new Connection)->connect()->prepare("SELECT * FROM account WHERE AccountID = :AccountID");
        $stmt->bindParam(":AccountID", $NewaccID, PDO::PARAM_STR);
		$stmt -> execute();
        return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
        // setcookie("church_name", $church_ID, time() + (86400 * 30), "/"); // 86400 = 1 day

	
    }
    

}


