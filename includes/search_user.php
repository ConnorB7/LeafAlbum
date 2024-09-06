<?php

require_once 'config_session.php';

if($_SERVER["REQUEST_METHOD"] === "POST"){
	$username = $_POST["username"];
		try{
            require_once 'dbh.php';
            require_once 'search_user_controller.php';
            require_once 'search_user_model.php';

            $result = search_user($pdo, $username);

            if(isset($result["username"])){
                header("location: ../profile.php?profile=" . $result["username"]);

                $pdo = null;
                $stmt = null;

                die();
            }
			else{
                header("location: ../search_page.php");

			
			$pdo = null;
			$stmt = null;
			
			die();
            }
		} catch(PDOException $e) {
			die("Query failed: " . $e->getMessage());
		}
} else {
    header("location: ../search_page.php");
    $pdo = null;
	die();
}