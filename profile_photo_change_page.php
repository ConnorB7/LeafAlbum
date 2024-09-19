<?php
require_once 'includes/config_session.php';
require_once 'includes/dbh.php';
require_once 'includes/nav_bar_view.php';
require_once 'includes/upload_view.php';
require_once 'includes/newsfeed_view.php';
require_once 'includes/newsfeed_model.php';
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
	if(isset($_SESSION["user_id"]) && !($_SESSION["user_username"] === "guest")){
		display_nav_bar();
		?>
		<div class="column1">
		<br><br><br><br>
		<h1><?php echo $_SESSION["user_username"] ?></h1>
		<br><br><?php
		echo '<a href="post_page.php?profile=' . $_SESSION["user_username"] . '&image=all">'; ?><h2>Images</h2></a>
		<br><?php
		echo '<a href="post_page.php?profile=' . $_SESSION["user_username"] . '&note=all">'; ?><h2>Notes</h2></a>
		<br><?php
		echo '<a href="post_page.php?profile=' . $_SESSION["user_username"] . '&plant=all">'; ?><h2>Plants</h2></a>
		<br>
		<a href="follower_page.php"><h2>Followers</h2></a>
		<br>
		<a href="following_page.php"><h2>Followings</h2></a>
		<br>
		<a href="account_settings_page.php"><h2>Account Settings</h2></a>
		</div>
		<div class="uploads">
        <br>
		<h3>Your current profile photo:</h3> 
		<br>
        <?php display_profile_image($pdo, $_SESSION["user_id"]); ?><br><br><br><br>
        <h3>Click on one of your images below to set it as your profile photo.</h3>
        <?php display_images_for_profile_photo($pdo, $_SESSION["user_id"]) ?>
		</div>
		<?php
	} else 
	{
		header("location: index.php");
	} ?>
</body>