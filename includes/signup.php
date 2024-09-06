<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	$signup_code = $_POST["signup_code"];

		try{
		
			require_once 'dbh.php';
			require_once 'signup_model.php';
			require_once 'signup_controller.php';

			// ERROR HANDLERS
			$errors = [];
			
			if(is_input_empty($username, $password, $email)){
				$errors["empty_input"] = "All fields must be filled in.";
			}
			if(is_username_taken($pdo, $username)){
				$errors["username_taken"] = "That username is already taken.";
			}
			if(is_email_taken($pdo, $email)){
				$errors["email_taken"] = "That email is already taken";
			}
			if(is_signup_code_incorrect($pdo, $signup_code)){
				$errors["signup_code_incorrect"] =
				"That signup-code was incorrect. 
				Contact a website administrator for a correct code";
			}
			
			require_once 'config_session.php';
			
			if($errors){
				$_SESSION["errors_signup"] = $errors;
				$signup_data = [
				"username" => $username,
				"email" => $email
				];
				$_SESSION["signup_data"] = $signup_data;
				
				header("location: ../signup_page.php");
				die();
			}
			
			create_user($pdo, $password, $username, $email);
			
			header("location: ../login_page.php?signup=success");
			
			$pdo = null;
			$stmt = null;
			
			die();
		} catch(PDOException $e) {
			die("Query failed: " . $e->getMessage());
		}
} else {
	header("location: ../index.php");
	die();
}

	