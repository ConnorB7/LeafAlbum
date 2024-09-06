<?php

if($_SERVER["REQUEST_METHOD"] === "POST" && $_SESSION["user_id"]){


    
} else {
    header("location: ../login_page.php");
    die();
}