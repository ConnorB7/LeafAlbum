<?php
require_once 'includes/config_session.php';
require_once 'includes/signup_view.php';
require_once 'includes/nav_bar_view.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="main.css" rel="stylesheet" />
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LeafAlbum</title>
	<script src="main.js"></script>
</head>

<body>
    <?php
    display_nav_bar();
    if(!isset($_SESSION["user_id"]))
    {   
        ?>
        <div class="uploads">
        <form action="includes/signup.php" method="post">
            <?php
            signup_inputs();
            ?>
            <input type="image" src="images/signup.png" alt="Submit">
        </form>
        <?php
        if(isset($_GET["signup"]) && $_GET["signup"] === "success"){
            header("location: profile.php");
        }
        check_signup_errors();
        ?>
        </div>
        <?php
    } 
    else 
    {
        header("location: login_page.php");
    }
    ?>
</body>