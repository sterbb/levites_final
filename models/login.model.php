<?php
require_once "connection.php";

// Set the session cookie to expire when the browser is closed
session_set_cookie_params(0);
session_start();

class ModelLogin{


	public function Login($data){
		$db = new Connection();
		$pdo = $db->connect();
        $status= 1;

		try{
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();
	
			$stmt = $pdo->prepare("SELECT acc_username, acc_password,fname,acc_type	 FROM account WHERE verify_status = :verify_status AND acc_username = :acc_username");
			$stmt -> bindParam(":acc_username", $data['login_username'], PDO::PARAM_STR);
            $stmt -> bindParam(":verify_status", $status, PDO::PARAM_INT);
			$stmt->execute();
			$result = $stmt->fetchAll();
            

		    foreach($result as $row){
                $acc_username = $row['fname'];
                $acc_type = $row["acc_type"];	
                    if($data['login_password'] == $row["acc_password"]){

                        $pdo->commit();
                        echo "success";

                        return "ok";
                    

                    }else{
                        echo "fail";
                    }
			}
			

		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
		$pdo = null;	
		$stmt = null;
			

	
	}

}