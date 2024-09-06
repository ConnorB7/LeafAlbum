<?php
require_once 'includes/config_session.php';
require_once 'includes/dbh.php';
require_once 'includes/nav_bar_view.php';
require_once 'includes/newsfeed_view.php';
require_once 'includes/newsfeed_model.php';
require_once 'includes/newsfeed_controller.php';
require_once 'includes/follow_status_controller.php';
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
	if(isset($_SESSION["user_id"]))
    {
        if(isset($_GET["note"]))
        {
            $note_user_id = get_note_user_id($pdo, $_GET["note"]);
            if(follow_status($pdo, $note_user_id, $_SESSION["user_id"]) || is_public($pdo, $note_user_id))
            {
                get_note($pdo, $_GET["note"]);
            }
            else
            {
                header("location: profile.php?profile" . note_username($pdo, $_GET["note"]));                
            }
        }
        else if(isset($_GET["profile"]))
        {
            $profile_id = get_user_id($pdo, $_GET["profile"]);
            if(follow_status($pdo, $profile_id, $_SESSION["user_id"]) || is_public($pdo, $profile_id))
            {
                get_notes($pdo, $profile_id);
            }
            else
            {
                header("location: profile.php?profile=" . $_GET["profile"]);                
            }
        }
        else
        {
            get_notes($pdo, $_SESSION["user_id"]);
        }
	display_nav_bar();
	} else 
	{
	    header("location: index.php");
	} ?>
</body>