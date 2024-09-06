<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
	$current_password = $_POST["current_password"];
	$new_password_1 = $_POST["new_password_1"];
    $new_password_2 = $_POST["new_password_2"];

		try{
		
			require_once 'dbh.php';
            require_once 'config_session.php';
			require_once 'password_change_model.php';
			require_once 'password_change_controller.php';
            require_once 'password_change_view.php';

            $errors = [];
            $result = get_user($pdo, $_SESSION["user_id"]);

            if(incorrect_current_password($result["password"], $current_password)){
                $errors["incorrect_current_password"] = 
                "That is not the correct current password";
            }
            else{
                if(passwords_dont_match($new_password_1, $new_password_2)){
                    $errors["passwords_dont_match"] = 
                    "Your two new passwords do not match.";
                } else{
                    if(password_too_short($new_password_1)){
                        $errors["password_too_short"] = 
                        "New password must be atleast 6 characters long";
                    }
                    if(password_not_capital_lowercase($new_password_1)){
                        $errors["password_not_capital_lowercase"] = 
                        "New password must have a lowercase and uppercase letter";
                    }
                    if(password_no_numbers($new_password_1)){
                        $errors["password_no_numbers"] =
                        "New password must have a number";
                    }
                }
            }
            require_once 'config_session.php';
            
            if($errors){
                $_SESSION["errors_password_change"] = $errors;
                header("location: ../password_change_page.php");
                die();
            }
            
            change_password($pdo, $new_password_1);
            
            header("location: ../password_change_page.php?password_change=success");
            
            $pdo = null;
            $stmt = null;
            
            die();   
        }
        catch(PDOException $e) {
			die("Query failed: " . $e->getMessage());
		}   
} else {
	header("location: ../login_page.php");
	die();
}