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
        if(!(isset($_GET["image"]) || isset($_GET["note"]) || isset($_GET["image"])) && isset($_GET["profile"])){
            header("location: profile.php?profile=" . $_SESSION['user_username']);
        }
		display_nav_bar();
        if(isset($_GET["profile"])){
            if(isset($_GET["image"])){
                $post_user_id = get_user_id_from_username($pdo, $_GET["profile"]);
                if((get_privacy_status($pdo, $post_user_id) === "public" || 
                follow_status($pdo, $post_user_id, $_SESSION["user_id"]) === "following" ||
                $_GET["profile"] == $_SESSION["user_username"])){
                    $user_image_ids = get_user_image_ids($pdo, $post_user_id);
                    foreach($user_image_ids as $user_image_id){
                        $post_user_id = get_image_user_id($pdo, $user_image_id["id"]);
                        echo "<div class='column2'>";
                        get_single_image($pdo, $user_image_id["id"]);
                    }
                }
                else{
                    echo "<h1>You do not follow that user</h1>";
                }
            }
            else if(isset($_GET["note"])){
                $post_user_id = get_user_id_from_username($pdo, $_GET["profile"]);
                if((get_privacy_status($pdo, $post_user_id) === "public" || 
                follow_status($pdo, $post_user_id, $_SESSION["user_id"]) === "following" ||
                $_GET["profile"] == $_SESSION["user_username"])){
                    $user_note_ids = get_user_note_ids($pdo, $post_user_id);
                    foreach($user_note_ids as $user_note_id){
                        $post_user_id = get_note_user_id($pdo, $user_note_id["id"]);
                        echo "<div class='column2'>";
                        get_note($pdo, $user_note_id["id"]);
                    }
                }
                else{
                    echo "<h1>You do not follow that user</h1>";
                }
            }
            else if(isset($_GET["image"])){
                $post_user_id = get_user_id_from_username($pdo, $_GET["profile"]);
                if((get_privacy_status($pdo, $post_user_id) === "public" || 
                follow_status($pdo, $post_user_id, $_SESSION["user_id"]) === "following" ||
                $_GET["profile"] == $_SESSION["user_username"])){
                    $user_image_ids = get_user_image_ids($pdo, $post_user_id);
                    foreach($user_image_ids as $user_image_id){
                        $post_user_id = get_image_user_id($pdo, $user_image_id["id"]);
                        echo "<div class='column2'>";
                        get_image($pdo, $user_image_id["id"]);
                    }
                }
                else{
                    echo "<h1>You do not follow that user</h1>";
                }
            }
            echo "</div>";
        }
        else{
            if(isset($_GET["image"])){
                $post_user_id = get_image_user_id($pdo, $_GET["image"]);
                if(get_privacy_status($pdo, $post_user_id) === "public" || 
                follow_status($pdo, $post_user_id, $_SESSION["user_id"]) === "following" || $post_user_id == $_SESSION["user_id"]){
                    echo "<div class='column2'>";
                    get_single_image($pdo, $_GET["image"]);
                    display_comments($pdo, $_GET["image"], "image");
                    echo "</div><div class='column1'>
                    <br><br><br><h1>Likes</h1><br><br>";
                    display_likes($pdo, $_GET["image"], "image");
                    echo "</div>";
                }
                else{
                    echo "<h1>You do not follow that user</h1>";
                }
            }
            else if(isset($_GET["note"])){
                $post_user_id = get_note_user_id($pdo, $_GET["note"]);
                if(get_privacy_status($pdo, $post_user_id) === "public" || 
                follow_status($pdo, $post_user_id, $_SESSION["user_id"]) === "following" || $post_user_id == $_SESSION["user_id"]){
                    echo "<div class='column2'>";
                    get_note($pdo, $_GET["note"]);
                    display_comments($pdo, $_GET["note"], "note");
                    echo "</div><div class='column1'>
                    <br><br><br><h1>Likes</h1><br><br>";
                    display_likes($pdo, $_GET["note"], "note");
                    echo "</div>";
            }
            else{
                echo "<h1>You do not follow that user</h1>";
            }
            }
            else if(isset($_GET["plant"])){
                $post_user_id = get_plant_user_id($pdo, $_GET["plant"]);
                if(get_privacy_status($pdo, $post_user_id) === "public" || 
                follow_status($pdo, $post_user_id, $_SESSION["user_id"]) === "following" || $post_user_id == $_SESSION["user_id"]){
                    echo "<div class='column2'>";
                    get_plant($pdo, $_GET["plant"]);
                    display_comments($pdo, $_GET["plant"], "plant");
                    echo "</div><div class='column1'>
                    <br><br><br><h1>Likes</h1><br><br>";
                    display_likes($pdo, $_GET["plant"], "plant");
                    echo "</div>";
            }
            else{
                echo "<h1>You do not follow that user</h1>";
            }
            }
            echo "</div>";
            ?>
            
            <?php
        }
	} else 
	{
		header("location: index.php");
	} ?>
</body>