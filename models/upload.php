<?php
require_once "connection.php";
$db = new Connection();
$pdo = $db->connect();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if an avatar is being uploaded
    if (isset($_FILES['userAvatar'])) {
        $targetDir = "./views/UploadAvatar/";
        $targetFilePath = $targetDir . basename($_FILES['userAvatar']['name']);
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'gif', 'JPEG', 'JPG', 'PNG', 'PDF', 'GIF');

        if (in_array($fileType, $allowTypes) && move_uploaded_file($_FILES['userAvatar']['tmp_name'], $targetFilePath)) {
            $newAvatar = basename($targetFilePath); // Assign to a variable
            
            $stmt = $pdo->prepare("UPDATE churches SET Avatar = :newAvatar WHERE churchID = :churchID");
            $stmt->bindParam(':newAvatar', $newAvatar);
            $stmt->bindParam(':churchID', $_COOKIE['church_id'], PDO::PARAM_STR);

            if ($stmt->execute()) {
                
        
            } else {
               
            }
        } else {
            
        }
    }


    // Check if a background image is being uploaded
    if (isset($_FILES['userBack'])) {
        $newtargetDir = "./views/UploadBack/";
        $newtargetFilePath = $newtargetDir . basename($_FILES['userBack']['name']);
        $newfileType = pathinfo($newtargetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'gif', 'JPEG', 'JPG', 'PNG', 'PDF', 'GIF');

        if (in_array($newfileType, $allowTypes) && move_uploaded_file($_FILES['userBack']['tmp_name'], $newtargetFilePath)) {
            $newBack = basename($newtargetFilePath); // Assign to a variable
            
            $stmt = $pdo->prepare("UPDATE churches SET Back = :newBack WHERE churchID = :churchID");
            $stmt->bindParam(':newBack', $newBack);
            $stmt->bindParam(':churchID', $_COOKIE['church_id'], PDO::PARAM_STR);
		
            if ($stmt->execute()) {
              
      
            } else {
             
            }
        } else {
           
        }
    }
}
?>


<?php
require_once "connection.php";
$db = new Connection();
$pdo = $db->connect();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if an avatar is being uploaded
    if (isset($_FILES['publicAvatar'])) {
        $PubtargetDir = "./views/UploadAvatar/";
        $PubtargetFilePath = $PubtargetDir . basename($_FILES['publicAvatar']['name']);
        $PubfileType = pathinfo($PubtargetFilePath, PATHINFO_EXTENSION);
        $PuballowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'gif', 'JPEG', 'JPG', 'PNG', 'PDF', 'GIF');

        if (in_array($PubfileType, $PuballowTypes) && move_uploaded_file($_FILES['publicAvatar']['tmp_name'], $PubtargetFilePath)) {
            $newPubAvatar = basename($PubtargetFilePath); // Assign to a variable
            
            $stmt = $pdo->prepare("UPDATE account SET Avatar = :newPubAvatar WHERE AccountID = :AccountID");
            $stmt->bindParam(':newPubAvatar', $newPubAvatar);
            $stmt->bindParam(':AccountID', $_COOKIE['acc_id'], PDO::PARAM_STR);

            if ($stmt->execute()) {
                
        
            } else {
                
            }
        } else {
            
        }
    }
}



?>
