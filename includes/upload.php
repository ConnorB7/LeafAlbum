<?php
			
require_once 'dbh.php';
require_once 'config_session.php';
require_once 'account_controller.php';
require_once 'upload_view.php';
require_once 'upload_model.php';
require_once 'upload_controller.php';



if (isset($_POST['submit'])){
    try{
        $plant_title = $_POST["plant_title"];
        
        $title = $_POST["title"];
        $taken_at = $_POST["taken_at"];
        $file = $_FILES['file'];

        $file_name = $_FILES['file']['name'];
        $file_temp_name = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_error = $_FILES['file']['error'];
        $file_type = $_FILES['file']['type'];

        $file_ext = explode('.', $file_name);
        $file_actual_ext = strtolower(end($file_ext));

        $allowed = array('jpg',' jpeg', 'png');

        $errors = [];
        if(in_array($file_actual_ext, $allowed)){
            if(user_logged_in()) {
                if ($file_error === 0) {
                    if ($file_size < 1900000) {
                        $file_name_new = retrieve_username() . "$" . uniqid('', true) . "." . $file_actual_ext;
                        $file_destination = 'uploads/' . $file_name_new;
                        move_uploaded_file($file_temp_name, $file_destination);
                    } else {
                        $errors["image_too_large"] = "That image is too large to upload.";
                    }
                } else {
                    $errors["error_uploading"] = "There was an error during the uploading.";
                }
            } else {
                $errors["not_logged_in"] = "You must be logged in to upload images.";
            }
        } else {
            $errors["invalid_file_type"] = "Only jpg, jpeg, and png files may be uploaded.";
        }
        
        if($errors){
            $_SESSION["upload_errors"] = $errors;
            $signup_data = [
            "title" => $title,
            "taken_at" => $taken_at
            ];
            $_SESSION["upload_data"] = $upload_data;
            
            header("location: ../profile.php?upload=failed");
            die();
        }
    } catch(PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
    create_image($pdo, $file_name_new, $_SESSION["user_id"], $title,
     $plant_title, $taken_at);
    header("location: ../profile.php?upload=success");
    die();

}