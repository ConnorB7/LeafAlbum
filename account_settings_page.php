<?php
require_once 'includes/config_session.php';
require_once 'includes/upload_view.php';
require_once 'includes/image_model.php';
require_once 'includes/account_privacy_setting_controller.php';
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
	if($_SESSION["user_username"] === "Guest"){
		display_nav_bar();
		echo "<p>Guest Accounts cannot alter their account settings. 
		<br>They may only view the content of other accounts.
		<br>Go to the newsfeed to see posts.</p>";
	}
	else if(isset($_SESSION["user_id"])){
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
		<h3>Change your password</h3>
		<br>
		<a href="password_change_page.php" class="img"><img src="images/change_password.png"></a>
		<br><br>
		<h3>Your account privacy setting: <?php echo get_privacy_status($pdo, $_SESSION["user_id"]) ?></h3><br>
			<?php if(get_privacy_status($pdo, $_SESSION["user_id"]) === "private") 
			{?>
				<form action="includes/account_privacy_setting.php?setting=public" method="post">		
					<input type="image" src="images/set_to_public.png" alt="Submit">
				</form>
			<?php
			}
			else
			{
				?>
				<form action="includes/account_privacy_setting.php?setting=private" method="post">		
					<input type="image" src="images/set_to_private.png" alt="Submit">
				</form>
				<?php
			} ?>
		</form>
		<br>
		<h3>Change your profile photo</h3>
		<br>
		<a href="profile_photo_change_page.php" class="img"><img src="images/set_profile_photo.png"></a>
		<br>
		<br>
		</div>
		<?php
	}
	else{
		header("location: index.php");
	}
	?>
</body>

