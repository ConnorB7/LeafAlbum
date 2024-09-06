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
		<h1>Change your password</h1>
		<a href="password_change_page.php">change password</a>

		<h1>Your account privacy setting: <?php echo get_privacy_status($pdo, $_SESSION["user_id"]) ?>
			<?php if(get_privacy_status($pdo, $_SESSION["user_id"]) === "private") 
			{?>
				<form action="includes/account_privacy_setting.php?setting=public" method="post">		
					<button>Set to public</button>
				</form>
			<?php
			}
			else
			{
				?>
				<form action="includes/account_privacy_setting.php?setting=private" method="post">		
					<button>Set to private</button>
				</form>
				<?php
			} ?>
		</form>
		<?php
	}
	else{
		header("location: index.php");
	}
	?>
</body>

