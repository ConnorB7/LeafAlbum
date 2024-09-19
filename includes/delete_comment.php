<?php
require_once 'config_session.php';
$comment_id = (int)$_GET["comment"];
    
require_once 'dbh.php';
require_once 'delete_comment_model.php';
require_once 'delete_comment_controller.php';
require_once 'config_session.php';

delete_comment($pdo, $comment_id);

header("location:" . $_SESSION["return_url"]);

$pdo = null;
$stmt = null;

die();
