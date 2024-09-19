<?php

require_once 'dbh.php';
require_once 'edit_note_model.php';
require_once 'newsfeed_model.php';
require_once 'newsfeed_controller.php';
require_once 'follow_status_model.php';
require_once 'config_session.php';


if(isset($_GET["note"])){
    if($_SESSION["user_id"] === get_note_user_id($pdo, $_GET["note"])){
        edit_note_content($pdo, $_GET["note"], $_POST["note"]);
    }
}


$pdo = null;
$stmt = null;
header("location:" . $_SESSION["return_url"]);
die();
