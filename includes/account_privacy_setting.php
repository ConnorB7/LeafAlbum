<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
	$setting = $_GET["setting"];
		try{
		
			require_once 'dbh.php';
            require_once 'config_session.php';
			require_once 'account_privacy_setting_model.php';
			require_once 'account_privacy_setting_controller.php';

            set_privacy_setting($pdo, $setting, $_SESSION["user_id"]);
			
			header("location: ../account_settings_page.php?privacy_change=success");
			
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

	