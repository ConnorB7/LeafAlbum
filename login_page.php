<?php
require_once 'includes/config_session.php';
require_once 'includes/login_view.php';
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
    if(!isset($_SESSION["user_id"])){ ?>
        <div class="uploads">
        <h4>Login</h4>
        <br>
        <form action="includes/login.php" method="post">
            <label>
                <input type="text" name="username" placeholder="username">
            </label>
            <label>
                <input type="password" name="password" placeholder="password">
            </label>
            <button>Login</button>
        </form>
        <?php 
        if(isset($_GET["login"]) && $_GET["login"] === "success"){
            header("location: profile.php");
        }

        check_login_errors();
        ?>
        <br>
        <h4>Guest Account Login</h4>
        <br>
        <form action="includes/login.php" method="post">
            <label>
                <input type="text" name="username" placeholder="username" value="Guest">
            </label>
            <label>
                <input type="password" name="password" placeholder="password" value="Guest123">
            </label>
            <button>Login</button>
        </form>
		<br>
        <a href="signup_page.php"><h4>Account Signup</h4></a><br> <?php
    } else {
        echo "<div class='uploads'>You are currently logged in as <b>" . $_SESSION["user_username"] . "</b>";?>
        <form action="includes/logout.php" method="post">
            <button>logout</button>
        </form>
        <?php
    } ?>
    </div>
</body>