<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    
    $title = $_POST["title"];
    $plant_type = $_POST["plant_type"];
    $plant_date = $_POST["plant_date"];
    $harvest_date = $_POST["harvest_date"];

		try{
		
			require_once 'dbh.php';
            require_once 'config_session.php';
			require_once 'create_plant_model.php';
			require_once 'create_plant_controller.php';

            $user_id = $_SESSION["user_id"];

            create_plant($pdo, $user_id, $title, $plant_type, $plant_date, $harvest_date);	
			
			header("location: ../profile.php?create_plant=success");
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
