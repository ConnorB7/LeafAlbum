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
	<h3>
		<?php
			output_username();
		?>
	</h3>
	<p>
		Welcome to Leaf Album!
	</p>
</body>

