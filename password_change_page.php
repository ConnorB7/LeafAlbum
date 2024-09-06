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
        echo "You are currently logged in as <b>" . $_SESSION["user_username"] . "</b>"; ?>
        <h1>Change Password</h1>
        <form action="includes/password_change.php" method="post">
            <label>
                <input type="password" name="current_password" placeholder="current password">
            </label>
            <label>
                <input type="password" name="new_password_1" placeholder="new password">
            </label>
            <label>
                <input type="password" name="new_password_2" placeholder="new password">
            </label>
            <button>submit</button>
        </form>
        <?php
        check_password_change_errors();
    }
    else 
    {
      header("location: login_page.php");
    }?>
</body>