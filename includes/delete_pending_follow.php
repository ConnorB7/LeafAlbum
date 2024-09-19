<?php

require_once 'config_session.php';
$pending_follow_id = (int)$_GET["follow_id"];

require_once 'dbh.php';
require_once 'delete_pending_follow_model.php';
require_once 'follow_status_model.php';
require_once 'follow_requests_model.php';


$pending_follow_data = get_pending_follow_data($pdo, $pending_follow_id);

if($pending_follow_data["user_id"] === $_SESSION["user_id"]){
    remove_pending_follow($pdo, $pending_follow_id);
}

$pdo = null;
$stmt = null;
header("location:" . $_SESSION["return_url"]);
die();

