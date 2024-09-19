<?php

require_once 'config_session.php';
require_once 'dbh.php';
require_once 'like_model.php';
require_once 'like_controller.php';
require_once 'config_session.php';
require_once 'delete_follow_model.php';

if(isset($_GET["follow_id"])){
    $follow_data = get_follow_data($pdo, $_GET["follow_id"]);
    if($follow_data["user_id"] === $_SESSION["user_id"] || $follow_data["follower_id"] === $_SESSION["user_id"]){
        delete_follow($pdo, $_GET["follow_id"], $follow_data["follower_id"], $follow_data["user_id"]);
    }
}

$pdo = null;
$stmt = null;

header("location:" . $_SESSION["return_url"]);
die();

