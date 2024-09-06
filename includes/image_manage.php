<?php

if($_SERVER["REQUEST_METHOD"] === "POST" && $_GET["image_id"]){
    try{
        require_once 'dbh.php';
        require_once 'image_manage_controller.php';
        require_once 'image_manage_model.php';
        require_once 'image_manage_view.php';

        delete_image($pdo, $_GET["image_id"]);
        header("location: ../profile.php?image_delete=success");
        die();
    }
    catch(PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
header("location: ../login_page.php");
die();
}