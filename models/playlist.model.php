<?php
require_once "connection.php";

class ModelPlaylist{

    

    public static function mdlShowPlaylist(){
        
        $newAccID = $_COOKIE["acc_id"];
        $stmt = (new Connection)->connect()->prepare("SELECT * FROM playlist WHERE accID = :accID");
        $stmt->bindParam(":accID", $newAccID, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
	
    }

    
    public static function mdlAddPlaylist($data){	
		$db = new Connection();
        $pdo = $db->connect();
        $newAccID = $_COOKIE["acc_id"];
        
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();

			$current_year = substr(date('Y'), -2 );
			$current_month = date('n');

            $playlist_id = (new Connection)->connect()->prepare("SELECT CONCAT('PL', LPAD((count(id)+1),4,'0'), '$current_month','$current_year') as playlist_id  FROM playlist FOR UPDATE");
			$playlist_id->execute();
			$playlistid = $playlist_id -> fetchAll(PDO::FETCH_ASSOC);
		
			
			$stmt = $pdo->prepare("INSERT INTO playlist (playlistID, accID, playlist_name, songs) 
            VALUES (:playlistID, :accID, :playlist_name, :songs)");


            $stmt->bindParam(":playlistID", $playlistid[0]['playlist_id'], PDO::PARAM_STR);
			$stmt->bindParam(":accID", $newAccID, PDO::PARAM_STR);
			$stmt->bindParam(":playlist_name", $data["playlist_name"], PDO::PARAM_STR);
            $stmt->bindParam(":songs", $data["songs"], PDO::PARAM_STR);
	

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


    public static function mdlDeletePlaylist($data) {

        $stmt = (new Connection)->connect()->prepare("DELETE FROM playlist WHERE playlistID = :playlistID");
        $stmt->bindParam(":playlistID", $data['playlistID'], PDO::PARAM_STR);
        $stmt->execute();
        
   
    }

    public static function mdlAddPlaylistSong($data){

        $newAccID = $_COOKIE["acc_id"];

        $stmt = (new Connection)->connect()->prepare("UPDATE playlist SET songs = :songs WHERE accID = :accID AND playlist_name = :playlist_name");
        $stmt->bindParam(":songs", $data['songs'], PDO::PARAM_STR);
        $stmt->bindParam(":accID", $newAccID, PDO::PARAM_STR);
        $stmt->bindParam(":playlist_name", $data['playlist_name'], PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;	
	
    }

      
	public static function 	mdlUpdatePlaylist($data){	
		$db = new Connection();
        $pdo = $db->connect();

		$website_group = $pdo->prepare("UPDATE playlist SET playlist_name = :newplaylist_name WHERE playlistID = :playlistID AND playlist_name = :oldplaylist_name");
			
		$website_group -> bindParam(":playlistID", $data["playlistid"], PDO::PARAM_STR);
		$website_group -> bindParam(":newplaylist_name", $data['newplaylistname'] , PDO::PARAM_STR);
		$website_group -> bindParam(":oldplaylist_name", $data['playlistname'] , PDO::PARAM_STR);
		$website_group->execute();

		return 
		

		// print_r(json_encode($updatedWebsiteList));
               
		$pdo = null;	
		$website_group = null;

    }

	// public static function mdlShowEventsLinkingPlaylist(){
    //     $acc_id = $_COOKIE["acc_id"];
		
	// 	$stmt = (new Connection)->connect()->prepare("SELECT * FROM playlist WHERE accID = :accID");
	// 	$stmt->bindParam(":accID", $acc_id, PDO::PARAM_STR);
	// 	$stmt->execute();
	// 	return $stmt->fetchAll();
	
    // }

	public static function mdlShowEventsLinkingCalendar(){
        $church_ID = $_COOKIE["church_id"];
		$currentDate = date('Y-m-d');

        $stmt = (new Connection)->connect()->prepare("SELECT *
        FROM calendar
        WHERE STR_TO_DATE(event_date, '%Y-%m-%d') >= :currentDate AND churchID = :churchID ");

        $stmt->bindParam(":churchID", $church_ID, PDO::PARAM_STR);
		$stmt->bindParam(":currentDate", $currentDate, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;	
	
    }


    
}