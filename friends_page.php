<?php
require_once 'includes/dbh.php';
require_once 'includes/config_session.php';
require_once 'includes/account_controller.php';
require_once 'includes/friends_model.php';
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
	$friends = retrieve_friends($pdo, get_current_user());

	foreach($friends as $friend){
			echo "<a href='profile.php?profile=". $friend['username'] ." '>" . $friend['username'] . "</a><br>";
	}
}
else{
	header("location: index.php");
}
?>
</body>