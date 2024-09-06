<?php
require_once 'config_session.php';

if($_SERVER["REQUEST_METHOD"] === "POST" && $_SESSION["user_id"]){
    try{
        require_once 'dbh.php';
        require_once 'link_image_model.php';
        require_once 'link_image_controller.php';
        require_once 'link_image_view.php';

        $image_title = $_POST['image_title'];
        $plant_title = $_POST['plant_title'];
        $user_id = $_SESSION['user_id'];

        $errors = [];



        $result = link_image_to_plant($pdo, $image_title, $plant_title, $user_id);
        header("location: ../profile.php?=" . $result);
        die();
    }
    catch(PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
header("location: ../login_page.php");
die();
}