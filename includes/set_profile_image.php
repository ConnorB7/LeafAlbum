<?php

require_once 'config_session.php';
$image_id = $_GET["image"];


require_once 'dbh.php';
require_once 'set_profile_image_model.php';
require_once 'config_session.php';
require_once 'newsfeed_controller.php';
require_once 'newsfeed_model.php';

if($_SESSION["user_id"] === get_image_user_id($pdo, $image_id)){
    set_profile_image($pdo, $_SESSION["user_id"], $image_id);
}

$pdo = null;
$stmt = null;
header("location: ../profile_photo_change_page.php");
die();
