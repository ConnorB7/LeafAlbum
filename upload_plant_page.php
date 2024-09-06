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
	<h4><b>Upload a Plant</b></h4> 
	<br>
	<form action="includes/create_plant.php" method="POST" ENCTYPE="multipart/form-data">
			<br>
			<label for="upload_info">Write a title for this plant:</label>
			<br>
			<label>
					<input class="uploads" type="text" name="title" placeholder="plant title">
			</label>
			<br>
			<br>
			<label for="upload_info">Write the type of plant that this is:</label>
			<br>
			<label>
					<input class="uploads" type="text" name="plant_type" placeholder="plant type">
			</label>
			<br>
			<br>
			<label for="upload_info">Input the date that this plant was planted:</label>
			<br>
			<label>
					<input class="uploads" type="date" name="plant_date" placeholder="planting date">
			</label>
			<br>
			<br>
			<label for="upload_info">Input the date that this plant was harvested:</label>
			<br>
			<label>
					<input class="uploads" type="date" name="harvest_date" placeholder="harvesting date">
			</label>
			<br>
			<br>
			<button type="submit" name="submit"><img src="images/upload_plant.png"></button>
	</form>
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