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
<?php

require_once 'includes/dbh.php';
require_once 'includes/config_session.php';
require_once 'includes/newsfeed_view.php';
require_once 'includes/newsfeed_model.php';

?>
<body>
	<?php
	if(isset($_SESSION["user_id"])){
		display_nav_bar();
		get_newsfeed($pdo, $_SESSION['user_id']);
	} else 
	{
		header("location: index.php");
	} ?>
</body>
