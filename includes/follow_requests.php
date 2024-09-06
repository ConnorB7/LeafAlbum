<?php

require_once 'follow_requests_model.php';
require_once 'dbh.php';
require_once 'config_session.php';

if($_SESSION['user_id']){
    if(isset($_GET["accept"])){
        enact_follow($pdo, $_GET["accept"]);
        remove_pending_follow($pdo, $_GET["accept"]);
        header("location: ../follow_requests_page.php");
        $pdo = null;
        $stmt = null;
        die();
    }
    elseif(isset($_GET["deny"])){
        remove_pending_follow($pdo, $_GET["deny"]);
        header("location: ../follow_requests_page.php");
        $pdo = null;
        $stmt = null;
        die();
    }
} else 
{
    header("location: ../login_page.php");
    die();
} 