<?php
require_once 'includes/config_session.php';
require_once 'includes/signup_view.php';
require_once 'includes/login_view.php';
require_once 'includes/upload_view.php';
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
	<div class="uploads">
		<h4>
		Welcome to Leaf Album!
		</h4>
		<br>
		<p>
		LeafAlbum is a social media platform designed specifically for gardening enthusiasts. 
		<br>
		<br>
		Users can upload and share photos of their plants, whether they're showcasing a blooming flower, 
		a thriving vegetable garden, or a unique plant species. 
		<br>
		<br>
		The site allows gardeners to make detailed notes on each plant, documenting care routines, growth 
		progress, and any other relevant observations. 
		<br>
		<br>
		By following other users, you can stay updated with their gardening journeys, draw inspiration from 
		their posts, and engage in meaningful discussions through comments. 
		<br>
		<br>
</div>
</body>

