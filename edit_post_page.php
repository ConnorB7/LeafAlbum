<?php
require_once 'includes/config_session.php';
require_once 'includes/nav_bar_view.php';
require_once 'includes/dbh.php';
require_once 'includes/newsfeed_view.php';
require_once 'includes/newsfeed_controller.php';
require_once 'includes/newsfeed_model.php';
require_once 'includes/account_privacy_setting_controller.php';
require_once 'includes/account_privacy_setting_model.php';
require_once 'includes/follow_status_controller.php';
require_once 'includes/follow_status_model.php';
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
        if(isset($_GET["image"])){
            $post_user_id = get_image_user_id($pdo, $_GET["image"]);
            if($post_user_id === $_SESSION["user_id"]){
                display_nav_bar();
                echo "<div class='column2'>";
                get_image_edit($pdo, $_GET["image"]);
                echo "</div>";
            }
            else{
                header("location: newsfeed_page.php");
            }
        }
        else if(isset($_GET["note"])){
            $post_user_id = get_note_user_id($pdo, $_GET["note"]);
            if($post_user_id === $_SESSION["user_id"]){
                display_nav_bar();
                echo "<div class='column2'>";
                get_note_edit($pdo, $_GET["note"]);
                echo "</div>";
            }
            else{
                header("location: newsfeed_page.php");
            }
        }
        else if(isset($_GET["plant"])){
            $post_user_id = get_plant_user_id($pdo, $_GET["plant"]);
            if($post_user_id === $_SESSION["user_id"]){
                display_nav_bar();
                echo "<div class='column2'>";
                get_plant_edit($pdo, $_GET["plant"]);
                echo "</div>";
            }
            else{
                header("location: newsfeed_page.php");
            }
        }
        echo "<br></div>";
        ?>
        
        <?php
    } else 
	{
		header("location: index.php");
	} ?>
</body>