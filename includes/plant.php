<?php

if($_SERVER["REQUEST_METHOD"] === "POST" && $_GET["plant_id"]){
    try{
        require_once 'dbh.php';
        require_once 'plant_model.php';
        require_once 'plant_view.php';

        delete_plant($pdo, $_GET["plant_id"]);
        header("location: ../profile.php?plant_delete=success");
        die();
    }
    catch(PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
header("location: ../login_page.php");
die();
}