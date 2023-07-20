<?php
require_once "connection.php";

// Set the session cookie to expire when the browser is closed
session_set_cookie_params(0);
session_start();

require '../extensions/PHPMailer/src/Exception.php';
require '../extensions/PHPMailer/src/PHPMailer.php';
require '../extensions/PHPMailer/src/SMTP.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ModelLogin{


	public function Login($data){
		$db = new Connection();
		$pdo = $db->connect();
        $status= 1;

		try{
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();
	
			$stmt = $pdo->prepare("SELECT AccountID, acc_username, acc_password, fname, acc_type, acc_restriction, affiliated_church, affiliated_churchname FROM account WHERE verify_status = :verify_status AND acc_username = :acc_username");
			$stmt -> bindParam(":acc_username", $data['login_username'], PDO::PARAM_STR);
            $stmt -> bindParam(":verify_status", $status, PDO::PARAM_INT);
			$stmt->execute();
			$result = $stmt->fetchAll();
            

		    foreach($result as $row){
                $acc_username = $row['acc_username'];
				$acc_name = $row["fname"];	
                $acc_restriction = $row["acc_restriction"];	
				$acc_type = $row["acc_type"];	
				$acc_id= $row["AccountID"];
				$church_id= $row["affiliated_church"];
				$church_name= $row["affiliated_churchname"];
				

                    if($data['login_password'] == $row["acc_password"]){
						
						setcookie("acc_restriction", $acc_restriction, time() + (86400 * 30), "/"); // 86400 = 1 day
						setcookie("acc_type", $acc_type, time() + (86400 * 30), "/"); // 86400 = 1 day
						setcookie("acc_name", $acc_name, time() + (86400 * 30), "/"); // 86400 = 1 day
						setcookie("acc_id", $acc_id, time() + (86400 * 30), "/"); // 86400 = 1 day
						setcookie("church_id", $church_id, time() + (86400 * 30), "/"); // 86400 = 1 day
						setcookie("church_name", $church_name, time() + (86400 * 30), "/"); // 86400 = 1 day
						$_SESSION["acc_type"] = $acc_type;
                        $pdo->commit();
                        echo $acc_type;	

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

	public static function mdlForgotPassword($data){

		$db = new Connection();
		$pdo = $db->connect();

		$verify_token = substr(md5(rand()), 0,5);
		
		$mail = new PHPMailer(true);
		try{
			//Server settings
			// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'testclgf@gmail.com';                     //SMTP username
			$mail->Password   = 'hggcmqxkxorglsrr';                               //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			$mail->setFrom('jajajo@gmail.com', 'JAJAJo');
			$mail->addAddress('janryanadivinagracia25@gmail.com', 'Joe User');     //Add a recipient

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Levites Registration Confirmation';
			$mail->Body    = '<b>Welcome to Levites</b>
								<h1>Accept this request if you have registered! Disregard this message if not.</h1>
								<h1>'. $verify_token.'</h1> ';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
				$mail->send();
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}

		try{
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();
		$status = $pdo->prepare("UPDATE account SET verify_token = :verify_token WHERE acc_email = :acc_email ");
		$status->bindParam(":verify_token", $verify_token, PDO::PARAM_STR);
		$status->bindParam(":acc_email", $data['forgot_email'], PDO::PARAM_STR);
		$status->execute();

		setcookie("current_email", $data["forgot_email"], time() + (86400 * 30), "/"); // 86400 = 1 day
		

		$pdo->commit();
		echo "success";	
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
	
	}


	public static function mdlResetPassword($data){

		$db = new Connection();
		$pdo = $db->connect();

		try{
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();
		$status = $pdo->prepare("UPDATE account SET acc_password = :acc_password WHERE acc_email = :acc_email ");
		$status->bindParam(":acc_password", $data['new_password'], PDO::PARAM_STR);
		$status->bindParam(":acc_email", $_COOKIE['current_email'], PDO::PARAM_STR);
		$status->execute();

		$pdo->commit();
		echo "success";	
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
	
	}

}