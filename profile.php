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
	if($_GET["profile"] === $_SESSION["user_username"]){
		header("location: profile.php");
	}
	else if(isset($_SESSION["user_id"]))
	{
		if(!isset($_GET["account"]) && !isset($_GET['profile'])){
				header("location: profile.php?account=" . $_SESSION["user_username"]);
		}
			display_nav_bar();
			if(isset($_GET["profile"]))
			{
					echo '<h1>' . $_GET["profile"] . '</h1>';
					if(follow_status($pdo, $_GET["profile"], $_SESSION["user_id"]) === "following")
					{
							echo '<form action="includes/unfollow.php?profile=' 
							. $_GET["profile"] . '" method="POST" ENCTYPE="multipart/form-data">
									<button type="submit" name="submit">following</button>
							</form>';
							get_newsfeed($pdo, $_SESSION["user_id"]);
					}
					elseif(follow_status($pdo, $_GET["profile"], $_SESSION["user_id"]) === "pending")
					{
							if(!is_private($pdo, $_GET["profile"]))
							{
									echo '<form action="includes/follow_cancel_pending.php?profile=' 
									. $_GET["profile"] . '" method="POST" ENCTYPE="multipart/form-data">
											<button type="submit" name="submit">pending</button>
									</form>';
									get_newsfeed($pdo, $_SESSION["user_id"]);
							}
							else
							{

									echo '<form action="includes/follow_cancel_pending.php?profile=' 
									. $_GET["profile"] . '" method="POST" ENCTYPE="multipart/form-data">
											<button type="submit" name="submit">pending</button>
									</form>';
							}
					}
					elseif(follow_status($pdo, $_GET["profile"], $_SESSION["user_id"]) === "not_following")
					{
							if(!is_private($pdo, $_GET["profile"]))
							{
									echo '<form action="includes/follow.php?profile=' 
									. $_GET["profile"] . '" method="POST" ENCTYPE="multipart/form-data">
											<button type="submit" name="submit">not following</button>
									</form>';
									get_newsfeed($pdo, $_SESSION["user_id"]);
							}
							else
							{
									echo '<form action="includes/follow.php?profile=' 
									. $_GET["profile"] . '" method="POST" ENCTYPE="multipart/form-data">
											<button type="submit" name="submit">not following</button>
									</form>';
							}
					}
			}
			else if($_SESSION["user_username"] === "Guest"){
				echo "<p>Guest Accounts cannot upload to the website. 
				<br>They may only view the content of other accounts.
				<br>Go to the newsfeed to see posts.</p>";
			}
			else 
			{
					?>
					<h1><b><?php echo $_SESSION["user_username"] ?><b></h1>
					<br>

					<form action="includes/search_user.php" method="POST">
							<label>
									<input type="text" name="username" placeholder="search username">
									<button type="submit" name="submit">search</button>
							</label>
					</form>
					<br>

					<h4>Upload</h4>
					<form action="includes/upload.php" method="POST" ENCTYPE="multipart/form-data">
							<label>
									<input type="text" name="title" placeholder="image title">
							</label>
							<label>
									<input type="text" name="plant_title" placeholder="plant title">
							</label>
							<br>
							<label>
									<input type="date" name="taken_at" placeholder="day/month/year">
							</label>
							<br>
							<input type="file" name="file">
							<br>
							<button type="submit" name="submit">upload</button>
					</form>
					<br>

					<h4>Create Note</h4>
					<form action="includes/create_note.php" method="POST" ENCTYPE="multipart/form-data">
							<label>
									<input type="text" name="title" placeholder="note title">
							</label>
							<label>
									<input type="text" name="note" placeholder="note">
							</label>
							<br>
							<label>
									<input type="text" name="plant_title" placeholder="plant title">
							</label>
							<label>
									<input type="date" name="user_date" placeholder="day/month/year">
							</label>
							<button type="submit" name="submit">Create</button>
					</form>
					<br>

					<h4>Create Plant</h4>
					<form action="includes/create_plant.php" method="POST" ENCTYPE="multipart/form-data">
							<label>
									<input type="text" name="title" placeholder="plant title">
							</label>
							<label>
									<input type="text" name="plant_type" placeholder="plant type">
							</label>
							<br>
							<label>
									<input type="date" name="plant_date" placeholder="planting date">
							</label>
							<label>
									<input type="date" name="harvest_date" placeholder="harvesting date">
							</label>
							<button type="submit" name="submit">Create</button>
					</form>
					<br>

					<h4>Link Note</h4>
					<form action="includes/link_note.php" method="POST" ENCTYPE="multipart/form-data">
							<label>
									<input type="text" name="plant_title" placeholder="plant title">
							</label>
							<label>
									<input type="text" name="note_title" placeholder="note title">
							</label>
							<button type="submit" name="submit">Link Note</button>
					</form>
					<br>

					<h4>Link Image</h4>
					<form action="includes/link_image.php" method="POST" ENCTYPE="multipart/form-data">
							<label>
									<input type="text" name="plant_title" placeholder="plant title">
							</label>
							<label>
									<input type="text" name="image_title" placeholder="image title">
							</label>
							<br>
							<button type="submit" name="submit">Link Plant</button>
					</form>
					<br>

					<?php
					check_upload_errors();
					get_newsfeed($pdo, $_SESSION["user_id"]);
			}
	}            
	else 
	{
		header("location: index.php");
	} ?>
	<br>
</body>
<footer>
  <a href="account_settings_page.php">account settings</a>
</footer>