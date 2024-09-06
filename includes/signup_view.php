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
		?>
		<br>
		<h4>
			Signup
		</h4>
		<br>
		<h5>
			Input a username:
		</h5>
		<?php
		if(isset($_SESSION["signup_data"]["username"]) &&
		!isset($_SESSION["errors_signup"]["username_taken"])) 
		{
			echo '<input type="text" name="username" 
			placeholder="username" value="'. 
			$_SESSION["signup_data"]["username"] . 
			'">';
		}
		else{
			echo '<input type="text" name="username" 
			placeholder="username">';
		}
		?>
		<br>
		<br>
		<h5>
			Input a password:
		</h5>
		<?php
		echo '<input type="password" name="password" 
		placeholder="password">';
		?>
		<br>
		<br>
		<h5>
			Input an email:
		</h5>
		<?php
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
		?>
		<br>
		<br>
		<h5>
			Input a valid signup code:
		</h5>
		<?php
		echo '<input type="password" name="signup_code" placeholder="signup code"><br><br>';
}