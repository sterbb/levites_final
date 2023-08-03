<?php
require_once "connection.php";

class ModelWebsite{



    

    public static function mdlShowWebsites(){
        
        
        $accID = $_COOKIE["acc_id"];
        $stmt = (new Connection)->connect()->prepare("SELECT * FROM websites WHERE accountID = :accountID");
        $stmt->bindParam(":accountID", $accID, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
	
    }

	public static function mdlShowGroups(){
        
        
        $accID = $_COOKIE["acc_id"];
        $stmt = (new Connection)->connect()->prepare("SELECT * FROM websitegroups WHERE accID = :accID");
        $stmt->bindParam(":accID", $accID, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
	
    }

    public static function mdlAddWebsite($data){	
		$db = new Connection();
        $pdo = $db->connect();
        $accID = $_COOKIE["acc_id"];
        
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

			
			$stmt = $pdo->prepare("INSERT INTO websites (accountID,website_name,website_path, website_category) 
            VALUES (:accountID,:website_name, :website_path, :website_category)");

			// $stmt = $pdo->prepare("INSERT INTO register (AccountID,acc_username,acc_password,acc_email,acc_type,fname,lname,designation,acc_contact,religion,verify_token,created_at) 
            // VALUES (:AccountID,:acc_username,:acc_password,:acc_email,:acc_type,:fname,:lname,:designation,:acc_contact,:religion,:verify_token,:created_at)");

			$stmt->bindParam(":accountID", $accID, PDO::PARAM_STR);
			$stmt->bindParam(":website_name", $data["website_name"], PDO::PARAM_STR);
			$stmt->bindParam(":website_path", $data["website_path"], PDO::PARAM_STR);
			$stmt->bindParam(":website_category", $data["website_category"], PDO::PARAM_STR);


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


	public static function mdldeleteWebsite($data){	
		$db = new Connection();
        $pdo = $db->connect();
               
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();


			// Step 1: Fetch all the rows from websites table with the given website name and account ID
			$stmt = $pdo->prepare("SELECT * FROM websites WHERE accountID = :accountID AND website_name = :website_name");
			$stmt->bindParam(":accountID",  $data["w_id"], PDO::PARAM_STR);
			$stmt->bindParam(":website_name", $data["w_name"], PDO::PARAM_STR);
			$stmt->execute();
		
			// Step 2 and 3: Loop through the matching rows and delete websites from website groups
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				// Extract the data from the current row
				$group_name = $row["group_name"];
				$accountID = $row["accountID"];
				$websiteName = $row["website_name"];
		
				// Fetch the rows from website_groups table that contain the website to be deleted
				$stmt2 = $pdo->prepare("SELECT * FROM websitegroups WHERE accID = :accID");
				$stmt2->bindParam(":accID", $accountID, PDO::PARAM_STR);
				$stmt2->execute();
		
				// Loop through the website_groups and update websites_list for each row
				while ($groupRow = $stmt2->fetch(PDO::FETCH_ASSOC)) {
					$websitesList = json_decode($groupRow["websites_list"], true);
					$updatedWebsitesList = [];
		
					// Filter out the website to be deleted from the websites_list
					foreach ($websitesList as $website) {
						if ($website["name"] !== $websiteName) {
							$updatedWebsitesList[] = $website;
						}
					}
		
					// Update the websites_list in the current website_group row
					$updatedWebsitesListJSON = json_encode($updatedWebsitesList);
					$stmt3 = $pdo->prepare("UPDATE websitegroups SET websites_list = :websites_list WHERE group_name = :group_name");
					$stmt3->bindParam(":websites_list", $updatedWebsitesListJSON, PDO::PARAM_STR);
					$stmt3->bindParam(":group_name", $groupRow["group_name"], PDO::PARAM_INT);
					$stmt3->execute();
				}
		
				$stmt = $pdo->prepare("DELETE FROM websites WHERE accountID = :accountID AND website_name  = :website_name");
				$stmt->bindParam(":accountID",  $data["w_id"], PDO::PARAM_STR);
				$stmt->bindParam(":website_name", $data["w_name"], PDO::PARAM_STR);
				$stmt->execute();
			}


		    $pdo->commit();



			
		    return "ok";
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
		$pdo = null;	
		$stmt = null;

    }

	public static function mdldeleteWebsiteGroup($data){	
		$db = new Connection();
        $pdo = $db->connect();
               
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

			
			$stmt = $pdo->prepare("DELETE FROM websitegroups WHERE accID = :accID AND group_name  = :group_name");
			$stmt->bindParam(":accID",  $data["group_id"], PDO::PARAM_STR);
			$stmt->bindParam(":group_name", $data["group_name"], PDO::PARAM_STR);

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

	


	

	public static function mdldeleteWebsiteInGroup($data){	
		$db = new Connection();
        $pdo = $db->connect();


        $stmt = (new Connection)->connect()->prepare("SELECT websites_list FROM websitegroups WHERE accID = :accID AND group_name = :group_name");
        $stmt->bindParam(":accID", $data['group_id'], PDO::PARAM_STR);
		$stmt->bindParam(":group_name", $data['group_name'] , PDO::PARAM_STR);
		$stmt -> execute();
		$result =  $stmt -> fetch(PDO::FETCH_ASSOC);
		// $stmt -> close();
		// $stmt = null;	

		$websitelist = json_decode($result['websites_list'], true);

		$updatedWebsiteList = [];
		foreach ($websitelist as $key => $item) {
			if ($item['name'] != $data['w_name']) {
				$updatedWebsiteList[] = $item;
			}
		}


		$finallist = json_encode($updatedWebsiteList);

		$website_group = $pdo->prepare("UPDATE websitegroups SET websites_list = :websites_list WHERE accID = :accID AND group_name = :group_name");
			
		$website_group -> bindParam(":websites_list",$finallist , PDO::PARAM_STR);
		$website_group -> bindParam(":accID", $data["group_id"], PDO::PARAM_STR);
		$website_group -> bindParam(":group_name", $data['group_name'] , PDO::PARAM_STR);
		$website_group->execute();
		

		// print_r(json_encode($updatedWebsiteList));


               
	
		$pdo = null;	
		$stmt = null;

    }

	public static function 	mdlupdateWebsiteInGroup($data){	
		$db = new Connection();
        $pdo = $db->connect();

		$website_group = $pdo->prepare("UPDATE websitegroups SET group_name = :newgroup_name WHERE accID = :accID AND group_name = :oldgroup_name");
			
		$website_group -> bindParam(":accID", $data["groupid"], PDO::PARAM_STR);
		$website_group -> bindParam(":newgroup_name", $data['newgroupname'] , PDO::PARAM_STR);
		$website_group -> bindParam(":oldgroup_name", $data['groupname'] , PDO::PARAM_STR);
		$website_group->execute();
		

		// print_r(json_encode($updatedWebsiteList));
               
		$pdo = null;	
		$stmt = null;

    }


    
    public static function mdlAddGroup($data){	
		$db = new Connection();
        $pdo = $db->connect();
        $accID = $_COOKIE["acc_id"];
        
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

			
			$stmt = $pdo->prepare("INSERT INTO websitegroups (accID, group_name, websites_list) 
            VALUES (:accID, :group_name, :websites_list)");

			// $stmt = $pdo->prepare("INSERT INTO register (AccountID,acc_username,acc_password,acc_email,acc_type,fname,lname,designation,acc_contact,religion,verify_token,created_at) 
            // VALUES (:AccountID,:acc_username,:acc_password,:acc_email,:acc_type,:fname,:lname,:designation,:acc_contact,:religion,:verify_token,:created_at)");

			$stmt->bindParam(":accID", $accID, PDO::PARAM_STR);
			$stmt->bindParam(":group_name", $data["website_groupname"], PDO::PARAM_STR);
			$stmt->bindParam(":websites_list", $data["website_list"], PDO::PARAM_STR);

			$stmt->execute();		


			$websiteList = json_decode($data["website_list"]);

			//attendees
			foreach($websiteList as $website){
				$website_group = $pdo->prepare("UPDATE websites SET group_name = :group_name WHERE accountID = :accountID AND website_name = :website_name");
			
				$website_group -> bindParam(":accountID", $accID, PDO::PARAM_STR);
				$website_group -> bindParam(":group_name", $data["website_groupname"], PDO::PARAM_STR);
				$website_group -> bindParam(":website_name", $website -> name, PDO::PARAM_STR);
				$website_group->execute();

			}
			
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