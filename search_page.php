<?php

require_once 'includes/config_session.php';
require_once 'includes/dbh.php';
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
    ?>
    <div class="w3-content" style="max-width:1400px">
    <header class="w3-container w3-center w3-padding-32"> 
    <?php
    if(isset($_SESSION["user_id"]))
    {
        echo "There is no user with that username.";
    }
    else
    {
        header(location: "index.php");
    }
    ?>
</body>