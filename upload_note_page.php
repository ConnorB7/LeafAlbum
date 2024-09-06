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
	<h4>Upload a Note</h4> 
	<br>
	<form action="includes/create_note.php" method="POST" ENCTYPE="multipart/form-data">
			<br>
			<label for="upload_info">Write a title for this note:</label>
			<br>
			<label>
					<input class="uploads" type="text" name="title" placeholder="note title">
			</label>
			<br>
			<br>
			<label for="upload_info">Write the text for the note:</label>
			<br>
			<label>
			<textarea class="uploads note" name="note" rows="4" cols="50" maxlength=2999></textarea>
			</label>
			<br>
			<br>
			<label for="upload_info">Input the date that the photo was taken:</label>
			<br>
			<label>
				<input type="date" class="uploads" name="user_date" placeholder="day/month/year">
			</label>
			<br>
			<br>
			<button type="submit" name="submit"><img src="images/upload_note.png"></button>
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