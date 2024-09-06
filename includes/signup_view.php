<?php

declare(strict_types=1);
 
function check_signup_errors(): void
{
	if(isset($_SESSION['errors_signup'])) {
		$errors = $_SESSION['errors_signup'];
		
		echo "<br>";
		
		foreach($errors as $error) {
			echo '<p>' . $error . '</p>';
		}
		
		unset($_SESSION['errors_signup']);
} else if(isset($_GET["signup"]) && $_GET["signup"] === "success") {
		echo '<br>';
		echo '<p>Signup successful</p>';
	}
}

function signup_inputs(): void
{

		if(isset($_SESSION["signup_data"]["username"]) &&
		!isset($_SESSION["errors_signup"]["username_taken"])) {
			echo '<input type="text" name="username" 
			placeholder="username" value="'
			. $_SESSION["signup_data"]["username"] . '">';
		}
		else{
			echo '<input type="text" name="username" 
			placeholder="username">';
		}
		
		echo '<input type="password" name="password" placeholder="password">';
		
		if(isset($_SESSION["signup_data"]["email"]) &&
		!isset($_SESSION["errors_signup"]["email_taken"])) {
			echo '<input type="text" name="email" 
			placeholder="email" value="'
			. $_SESSION["signup_data"]["email"] . '">';
		}
		else{
			echo '<input type="text" name="email" 
			placeholder="email">';
		}
		
		echo '<input type="password" name="signup_code" placeholder="signup code">';
}