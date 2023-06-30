<?php 

require_once "connection.php";



class ModelChurch {

    static public function mdlChurchAccount($data) {
        $db = new Connection();
        $pdo = $db->connect();



        
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();
			
			$stmt = $pdo->prepare("INSERT INTO register (churchID, username, password, religion, churchAddress, email, churchName, city, telnum, country, profleg, agree) 
            VALUES (:churchID, :username, :password, :religon, :churchAddress, :email, :churchName, :city, :telnum, :country, :profleg, :agree)");

            $stmt->bindParam(":churchID", $data["churchID"], PDO::PARAM_STR);
			$stmt->bindParam(":username", $data["username"], PDO::PARAM_STR);
			$stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
			$stmt->bindParam(":religion", $data["religion"], PDO::PARAM_STR);
			$stmt->bindParam(":churchAddress", $data["churchAddress"], PDO::PARAM_STR);   
			$stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
            $stmt->bindParam(":churchName", $data["churchName"], PDO::PARAM_STR);
            $stmt->bindParam(":city", $data["city"], PDO::PARAM_STR);
            $stmt->bindParam(":telnum", $data["telnum"], PDO::PARAM_STR);
            $stmt->bindParam(":country", $data["country"], PDO::PARAM_STR);
            $stmt->bindParam(":profleg", $data["profleg"], PDO::PARAM_STR);
            $stmt->bindParam(":agree", $data["agree"], PDO::PARAM_STR);

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


    
}





?>
