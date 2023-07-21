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

    public static function mdlShowChurchProfile($churchID){
        
        
        $stmt = (new Connection)->connect()->prepare("SELECT * FROM churches WHERE churchID = :churchID");
        $stmt->bindParam(":churchID", $churchID, PDO::PARAM_STR);
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


    public static function mdlAddChurchMap($data){

        $db = new Connection();
        $pdo = $db->connect();
        $ChuchID = $_COOKIE["church_id"];


        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();


            $stmt = $pdo->prepare("UPDATE churches SET lat = :lat, lng = :lng WHERE churchID = :churchID");

			// $stmt = $pdo->prepare("INSERT INTO register (AccountID,acc_username,acc_password,acc_email,acc_type,fname,lname,designation,acc_contact,religion,verify_token,created_at) 
            // VALUES (:AccountID,:acc_username,:acc_password,:acc_email,:acc_type,:fname,:lname,:designation,:acc_contact,:religion,:verify_token,:created_at)");

			$stmt->bindParam(":churchID", $ChuchID);
			$stmt->bindParam(":lat", $data["latitude"]);
            $stmt->bindParam(":lng", $data["longitude"]);

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


    public static function mdlGetChurchMap(){
        $NewaccID = $_COOKIE['church_id'];
        $stmt = (new Connection)->connect()->prepare("SELECT lat, lng FROM churches WHERE churchID = :churchID");
        $stmt->bindParam(":churchID", $NewaccID, PDO::PARAM_STR);
		$stmt -> execute();
        return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;	
        // setcookie("church_name", $church_ID, time() + (86400 * 30), "/"); // 86400 = 1 day

        
    }


    


}


