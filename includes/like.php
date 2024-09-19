<?php

require_once 'config_session.php';
$user_id = (int)$_GET["user_id"];
$post_id = $_GET["post_id"];
$type = $_GET["type"];


require_once 'dbh.php';
require_once 'like_model.php';
require_once 'like_controller.php';
require_once 'like_model.php';
require_once 'newsfeed_model.php';
require_once 'newsfeed_controller.php';
require_once 'follow_status_model.php';
require_once 'config_session.php';

if((is_post_public($pdo, $post_id, $type) || 
is_user_following_poster($pdo, $post_id, $_SESSION["user_id"], $type) || $_SESSION["user_id"] === get_image_user_id($pdo, $post_id))){
    like_post($pdo, $user_id, $post_id, $type);
}

$pdo = null;
$stmt = null;
header("location:" . $_SESSION["return_url"]);
die();

