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

    public static function mdlUpdateChurchAccout($data)
    {

        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

            $pdo = (new Connection)->connect();
            $stmt = $pdo->prepare("UPDATE account SET acc_username = :acc_username, acc_password = :acc_password, fname = :fname, lname = :lname, designation = :designation, religion = :religion, acc_contact = :acc_contact, acc_email = :acc_email WHERE AccountID = :AccountID");
            
            $stmt->bindParam(":AccountID", $data["account_id"], PDO::PARAM_STR);
            $stmt->bindParam(":acc_username", $data["church_username"], PDO::PARAM_STR);
            $stmt->bindParam(":acc_password", $data["church_password"], PDO::PARAM_STR);
            $stmt->bindParam(":fname", $data["church_fname"], PDO::PARAM_STR);
            $stmt->bindParam(":lname", $data["church_lname"], PDO::PARAM_STR);
            $stmt->bindParam(":designation", $data["church_designation"], PDO::PARAM_STR);
            $stmt->bindParam(":religion", $data["church_religion"], PDO::PARAM_STR);
            $stmt->bindParam(":acc_contact", $data["church_telnum"], PDO::PARAM_STR);
            $stmt->bindParam(":acc_email", $data["church_email"], PDO::PARAM_STR);
            
            $stmt->execute();
            $pdo->commit();
                
            return "ok";
        }catch (Exception $e){
            $pdo->rollBack();
            return "error";
        }	
        $pdo = null;	
        $stmt = null;
    }



    public static function mdlUpdateChurchDetail($data)
    {

        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

            $pdo = (new Connection)->connect();
            $stmt2 = $pdo->prepare("UPDATE churches SET church_name = :church_name, church_num = :church_num, church_address = :church_address, church_city = :church_city, religion = :religion, church_email = :church_email WHERE churchID = :churchID");

            $stmt2->bindParam(":churchID", $churchid[0]['church_id'], PDO::PARAM_STR);
            $stmt2->bindParam(":church_name", $data["church_name"], PDO::PARAM_STR);
            $stmt2->bindParam(":church_num", $data["church_cotnum"], PDO::PARAM_STR);
            $stmt2->bindParam(":church_address", $data["church_address"], PDO::PARAM_STR);
            $stmt2->bindParam(":church_city", $data["church_city"], PDO::PARAM_STR);
            $stmt2->bindParam(":religion", $data["church_religion"], PDO::PARAM_STR);
            $stmt2->bindParam(":church_email", $data["church_email"], PDO::PARAM_STR);
            
            $stmt2->execute();
            $pdo->commit();
            
            return "ok";
        }catch (Exception $e){
            $pdo->rollBack();
            return "error";
        }	
        $pdo = null;	
        $stmt = null;
    }
    
    


}


