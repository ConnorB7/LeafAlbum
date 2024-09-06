<?php
require_once 'follow_cancel_pending_controller.php';
require_once 'config_session.php';
require_once 'dbh.php';

if($_SERVER["REQUEST_METHOD"] === "POST"){
	$username = $_GET["profile"];
	$to_follow_user_id = $_SESSION["user_id"];
    cancel_follow_pending($pdo, $username, $to_follow_user_id);
    header("location: ../profile.php?profile=" . $_GET["profile"]);
    die();
} else {
	header("location: ../index.php");
	die();
}