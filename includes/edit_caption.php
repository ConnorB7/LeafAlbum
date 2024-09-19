<?php

require_once 'dbh.php';
require_once 'edit_caption_model.php';
require_once 'newsfeed_model.php';
require_once 'newsfeed_controller.php';
require_once 'follow_status_model.php';
require_once 'config_session.php';

if(isset($_GET["image"])){
    if($_SESSION["user_id"] === get_image_user_id($pdo, $_GET["image"])){
        edit_image_caption($pdo, $_GET["image"], $_POST["caption"]);
    }
}

if(isset($_GET["note"])){
    if($_SESSION["user_id"] === get_note_user_id($pdo, $_GET["note"])){
        edit_note_caption($pdo, $_GET["note"], $_POST["caption"]);
    }
}

if(isset($_GET["plant"])){
    if($_SESSION["user_id"] === get_plant_user_id($pdo, $_GET["plant"])){
        edit_plant_caption($pdo, $_GET["plant"], $_POST["caption"]);
    }
}

$pdo = null;
$stmt = null;
header("location:" . $_SESSION["return_url"]);
die();
