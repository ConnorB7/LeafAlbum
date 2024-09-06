<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
	$username = $_POST["username"];
	$password = $_POST["password"];

		try{
		
			require_once 'dbh.php';
			require_once 'login_model.php';
			require_once 'login_controller.php';

			// ERROR HANDLERS
			$errors = [];
			
			if(is_input_empty($username, $password)){
				$errors["empty_input"] = "All fields must be filled in.";
			}
			
			$result = get_user($pdo, $username);
			
			if (is_username_wrong($result)) {
				$errors["login_incorrect"] = "Incorrect username.";		
			}
			
			if (!is_username_wrong($result) && is_password_wrong($password, $result["password"])) {
				$errors["login_incorrect"] = "Incorrect password.";				
			}
			
			require_once 'config_session.php';
			
			if($errors){
				$_SESSION["errors_login"] = $errors;
				
				header("location: ../login_page.php");
				die();
			}
			$new_session_id = session_create_id();
			session_id($new_session_id);
			
			$_SESSION["user_id"] = $result["id"];
			$_SESSION["user_username"] = htmlspecialchars($result["username"]);
			$_SESSIONS["last_regeneration"] = time();			
			
			header("location: ../profile.php?login=success");
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
