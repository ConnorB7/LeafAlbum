<?php

require_once 'config_session.php';

function display_nav_bar(){
    echo 
	'<div class="sidebar bar-block border-right" style="display:none" id="mySidebar">
		<button onclick="w3_close()" class="bar-item button">Close &times;</button>';
		if(isset($_SESSION["user_id"])){
			echo 
			'<a href="includes/logout.php" class="bar-item button">Logout</a>
			<a href="profile.php" class="bar-item button">' . htmlspecialchars($_SESSION['user_username']) . '</a>
			<a href="newsfeed_page.php" class="bar-item button">Newsfeed</a>
			<a href="search_page.php" class="bar-item button">Search</a>
			<a href="index.php" class="bar-item button">About</a>
			<a href="upload_page.php" class="bar-item button">Upload</a>';
			if(isset($_GET["profile"])){
				echo '<a href="post_page.php?image=all&profile=' . $_GET["profile"] .'" class="bar-item button">Images</a>
				<a href="post_page.php?note=all&profile=' . $_GET["profile"] .'" class="bar-item button">Notes</a>
				<a href="post_page.php?plant=all&profile=' . $_GET["profile"] .'" class="bar-item button">Plants</a>
				<a href="account_settings_page.php" class="bar-item button">Settings</a>';
			}
			else{
				echo '<a href="post_page.php?image=all" class="bar-item button">Images</a>
				<a href="post_page.php?note=all" class="bar-item button">Notes</a>
				<a href="post_page.php?plant=all" class="bar-item button">Plants</a>
				<a href="account_settings_page.php" class="bar-item button">Settings</a>';

			}
		}
		else{
		echo 
		'<a href="includes/logout.php" class="bar-item button">Login</a>';
		}
	echo
	'</div>
	<div id="navbar">
		<div class="navButton">
			<button class="button teal xlarge" onclick="w3_open()">☰</button>
		</div>			
		<nav class="horizontal">
			<ul>';
				if(!isset($_SESSION["user_id"]))
				{
					echo
					'<li><a href="includes/login.php">Login</a></li>';
				}
				else
				{
					echo
					'<li><a href="includes/logout.php">Logout</a></li>
					<li><a href="profile.php">' . htmlspecialchars($_SESSION['user_username']) . '</a></li>
					<li><a href="upload_page.php">Upload</a></li>
					<li><a href="index.php">About</a></li>
					<li><a href="search_page.php">Search</a></li>
					<li><a href="newsfeed_page.php">Newsfeed</a></li>';
				}
				echo 
			'</ul>
		</nav>
		<nav class="horizontalimg">
            <a href="index.php" class="img"><img src="images/leaf.png"></a>
		</nav>
	</div>
	<br><br><br>';
}