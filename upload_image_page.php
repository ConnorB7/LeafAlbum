<?php
require_once 'includes/config_session.php';
require_once 'includes/nav_bar_view.php';
require_once 'includes/upload_view.php';
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
	?>
	<div class="uploads">
    <h4><b>Upload an Image</b></h4> 
    <br>
    <form action="includes/upload.php" method="POST" ENCTYPE="multipart/form-data">
		<br>
		<label for="upload_info">Write a title for this image:</label>
		<br>
            <input class="uploads" type="text" name="title" placeholder="image title">
		<br>
		<br>
		<label for="upload_info">Input the date that the photo was taken:</label>
		<br>
            <input type="date" class="uploads" name="taken_at" placeholder="day/month/year">
        <br>
		<br>
		<label for="upload_info">Upload a .jpg .jpeg or .png file:</label>
		<br>
        <input type="file" name="file">
        <br>
		<br>
		<br>
        <button type="submit" name="submit"><img src="images/upload_image.png"></button>
    </form>
    <br>
	<?php
	check_upload_errors();
	?>
	</div>
	<?php
	} else 
	{
		header("location: index.php");
	} ?>
</body>