<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    try{
        require_once 'dbh.php';
        require_once 'follow_status_controller.php';
        $user = $_GET("profile");
        $follower_id = $_SESSION("user_id");

        follow_status($pdo, $user, $follower_id);
        header("location: ../profile.php?profile=" . $user);
        die();
    }
    catch(PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
header("location: ../profile.php");
die();
}