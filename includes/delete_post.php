<?php
require_once 'dbh.php';
require_once 'config_session.php';
require_once 'delete_post_model.php';
require_once 'delete_post_controller.php';

if(isset($_GET["image"])){
    delete_image($pdo, $_GET["image"]);
}
if(isset($_GET["note"])){
    delete_note($pdo, $_GET["note"]);
}
if(isset($_GET["plant"])){
    delete_plant($pdo, $_GET["plant"]);
}


$pdo = null;
$stmt = null;
header("location:" . $_SESSION["return_url"]);
die();
