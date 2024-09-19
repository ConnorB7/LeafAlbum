<?php

require_once 'includes/config_session.php';
require_once 'includes/dbh.php';
require_once 'includes/nav_bar_view.php';
require_once 'includes/search_user_view.php';


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
        if(isset($_SESSION["user_id"])){
        display_nav_bar();
        if(isset($_SESSION["user_id"]))
        {?>
        <div class='uploads'>
                <br>
                <form action='includes/search_user.php' method='POST' ENCTYPE='multipart/form-data'>
                    <br>
                    <label for='upload_info'>Search for a user by typing in their username.</label>
                    <br>
                    <input class='uploads' type='text' name='username' placeholder='username'>
                    <br>
                    <button type='submit' name='submit'>Search</button>
                </form>
                <br>
            <?php
            if(isset($_GET["searched"])){
                display_invalid_username($_GET["searched"]);
            }
            ?>
            </div>
            <?php
            }
        else
        {
            header(location: "index.php");
        }
    }
	else 
	{
		header("location: login_page.php");
	} ?>
	<br>
</body>