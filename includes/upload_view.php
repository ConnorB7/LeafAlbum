<?php

function check_upload_errors(): void
{
	if(isset($_SESSION["upload_errors"])){
		$errors = $_SESSION["upload_errors"];
		
		echo "<br>";
		
		foreach($errors as $error) {
			echo "<p>" . $error . "</p>";
		}
		
		unset($_SESSION["upload_errors"]);
	}
	else if(isset($_GET["upload"]) && $_GET["upload"] === "success") {
		echo "<br>";
		echo "<p>upload successful.</p>";
	}
}