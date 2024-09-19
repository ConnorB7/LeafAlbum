<?php
require_once 'includes/config_session.php';
require_once 'includes/password_change_view.php';
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
    if(isset($_SESSION["user_id"])){ 
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
        <div class="uploads">;
        <h3>Change Password</h3>
        <br>
        <?php echo "You are currently logged in as <b>" . $_SESSION["user_username"] . "</b>"; ?>
        <form action="includes/password_change.php" method="post">
            <br>
			<label for="upload_info">Input your current password:</label>
			<br>
            <label>
                <input type="password" name="current_password" placeholder="current password">
            </label>
            <br>
            <br>
			<label for="upload_info">Input your new password:</label>
			<br>            
            <label>
                <input type="password" name="new_password_1" placeholder="new password">
            </label>
            <br>
            <br>
			<label for="upload_info">Input your new password again:</label>
			<br>
            <label>
                <input type="password" name="new_password_2" placeholder="new password">
            </label>
            <br>
            <br>
            <button>submit</button>
        </form>
        <?php
        check_password_change_errors();
        ?>
        </div>
        <?php
    }
    else 
    {
      header("location: login_page.php");
    }?>
</body>