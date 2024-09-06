<?php

declare(strict_types=1);
 
function check_password_change_errors(): void
{
	if(isset($_SESSION['errors_password_change'])) {
		$errors = $_SESSION['errors_password_change'];
		
		echo "<br>";
		foreach($errors as $error) {
			echo '<p>' . $error . '</p>';
		}
		
		unset($_SESSION['errors_password_change']);
} else if(isset($_GET["password_change"]) && $_GET["password_change"] === "success") {
		echo '<br>';
		echo '<p>Password change successful</p>';
	}
}