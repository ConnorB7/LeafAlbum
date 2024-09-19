<?php
require_once 'includes/follow_status_view.php';
require_once 'includes/config_session.php';
require_once 'includes/upload_view.php';
require_once 'includes/image_view.php';
require_once 'includes/plant_view.php';
require_once 'includes/note_view.php';
require_once 'includes/newsfeed_view.php';
require_once 'includes/newsfeed_model.php';
require_once 'includes/dbh.php';
require_once 'includes/nav_bar_view.php';
require_once 'includes/signup_controller.php';
require_once 'includes/signup_model.php';
require_once 'includes/like_view.php';
require_once 'includes/like_controller.php';
require_once 'includes/like_model.php';
require_once 'includes/comment_view.php';
require_once 'includes/comment_model.php';
require_once 'includes/comment_controller.php';

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
		if(!isset($_GET["profile"]) || 
		$_GET["profile"] == null || 
		!($_GET["profile"] === $_SESSION["user_username"] || is_username_taken($pdo, $_GET["profile"])))
		{
			header("location: profile.php?profile=" . $_SESSION["user_username"]);
		}
		display_nav_bar();
		if($_SESSION["user_username"] === "guest"){
			echo "<div class='column2'>
			<article class='main-container'>
			<p>Guest Accounts cannot upload to the website. 
			<br>They may only view the content of other accounts.
			<br>Go to the newsfeed to see posts.</p>
			</article>
			</div>";
		}
		else if(!(strtolower($_GET["profile"]) === $_SESSION["user_username"]))
		{
			?>
			<div class="column1">
				<br><br><br><br>
				<h1><?php echo htmlspecialchars($_GET["profile"]); ?></h1>
				<br><br>
				<?php echo '<a href="post_page.php?image=all&profile=' . $_GET["profile"] . '" ><h2>Images</h2></a>
				<br>
				<a href="post_page.php?note=all&profile=' . $_GET["profile"] . '"><h2>Notes</h2></a>
				<br>
				<a href="post_page.php?plant=all&profile=' . $_GET["profile"] . '" ><h2>Plants</h2></a>
				<br>'; ?>
			</div>
			<div class="column2">
			<?php
			if(follow_status($pdo, get_user_id_from_username($pdo, $_GET["profile"]), $_SESSION["user_id"]) === "following")
			{
				echo '<form action="includes/unfollow.php?profile=' 
				. htmlspecialchars($_GET["profile"]) . '" method="POST" ENCTYPE="multipart/form-data">
				<input type="image" src="images/unfollow.png" alt="Submit">
				</form>';
				display_profile_image($pdo, $_SESSION["user_id"]);
				get_newsfeed($pdo, $_SESSION["user_id"]);
			}
			elseif(follow_status($pdo, get_user_id_from_username($pdo, $_GET["profile"]), $_SESSION["user_id"]) === "pending")
			{
					if(!is_private($pdo, $_GET["profile"]))
					{
						echo '<form action="includes/follow_cancel_pending.php?profile=' 
						. $_GET["profile"] . '" method="POST" ENCTYPE="multipart/form-data">
						<input type="image" src="images/pending.png" alt="Submit">
						</form>';
						display_profile_image($pdo, $_SESSION["user_id"]);
						get_newsfeed($pdo, $_SESSION["user_id"]);
					}
					else
					{

						echo '<form action="includes/follow_cancel_pending.php?profile=' 
						. $_GET["profile"] . '" method="POST" ENCTYPE="multipart/form-data">
						<input type="image" src="images/pending.png" alt="Submit">
						</form>';
					}
			}
			elseif(follow_status($pdo, get_user_id_from_username($pdo, $_GET["profile"]), $_SESSION["user_id"]) === "not_following")
			{
					if(!is_private($pdo, $_GET["profile"]))
					{
						echo '<form action="includes/follow.php?profile=' 
						. $_GET["profile"] . '" method="POST" ENCTYPE="multipart/form-data">
						<input type="image" src="images/follow.png" alt="Submit">
						</form>';
						display_profile_image($pdo, $_SESSION["user_id"]);
						get_newsfeed($pdo, $_SESSION["user_id"]);
					}
					else
					{
						echo '<form action="includes/follow.php?profile=' 
						. $_GET["profile"] . '" method="POST" ENCTYPE="multipart/form-data">
						<input type="image" src="images/follow.png" alt="Submit">
						</form>';
					}
			}
			?>
			</div>
			<?php
		}
		else 
		{
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
			<div class="column2">
				<?php
				display_profile_image($pdo, $_SESSION["user_id"]);
				get_newsfeed($pdo, $_SESSION["user_id"]);
				?>
			</div>
			<?php
		}
	}            
	else 
	{
		header("location: login_page.php");
	} ?>
	<br>
</body>