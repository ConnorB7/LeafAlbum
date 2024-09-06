<?php

if($_SERVER["REQUEST_METHOD"] === "POST" && $_GET["note_id"]){
    try{
        require_once 'dbh.php';
        require_once 'note_model.php';
        require_once 'note_view.php';

        delete_note($pdo, $_GET["note_id"]);
        header("location: ../profile.php?note_delete=success");
        die();
    }
    catch(PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
header("location: ../login_page.php");
die();
}