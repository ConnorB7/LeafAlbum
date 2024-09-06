<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(isset($_POST["plant_title"])){
        $plant_title = $_POST["plant_title"];
    }
    
    $title = $_POST["title"];
    $note = $_POST["note"];
    $user_date = $_POST["user_date"];

		try{
		
			require_once 'dbh.php';
      require_once 'config_session.php';
			require_once 'create_note_model.php';
			require_once 'create_note_controller.php';

			$user_id = $_SESSION["user_id"];

			create_note($pdo, $user_id, $title,
			$plant_title, $note, $user_date);	
			
			header("location: ../profile.php?create_note=success");
			$pdo = null;
			$statement = null;
			
			die();
				
		} catch(PDOException $e) {
			die("Query failed: " . $e->getMessage());
		}
} else {
	header("location: ../login_page.php");
	die();
}