<?php
require_once 'config_session.php';

if($_SERVER["REQUEST_METHOD"] === "POST" && $_SESSION["user_id"] && $_GET["profile"]){
    try{
        require_once 'dbh.php';
        require_once 'unfollow_model.php';
        require_once 'unfollow_controller.php';
        require_once 'unfollow_view.php';

        unfollow_request($pdo, $_SESSION["user_id"], $_GET["profile"]);
        header("location: ../profile.php?profile=" . $_GET["profile"]);
        die();
    }
    catch(PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
header("location: ../login_page.php");
die();
}