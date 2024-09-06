<?php

require_once 'config_session.php';

function display_nav_bar(){
    echo '<div class="sidebar bar-block border-right" style="display:none" id="mySidebar">
							<button onclick="w3_close()" class="bar-item button">Close &times;</button>';
						if(isset($_SESSION["user_id"])){
							echo '
							<a href="includes/logout.php" class="bar-item button">Logout</a>';
							}
						else{
						echo '
							<a href="includes/logout.php" class="bar-item button">Login</a>';
							}
							echo '
							<a href="newsfeed_page.php" class="bar-item button">Newsfeed</a>
							<a href="friends_page.php" class="bar-item button">Friends</a>
							<a href="profile.php" class="bar-item button">Profile</a>
						</div>	
			<div id="navbar">
		 
			 <div class="navButton">
				 <button class="button teal xlarge" onclick="w3_open()">☰</button>
			 </div>			
			 <nav class="horizontal">
				<ul>';
                if(!isset($_SESSION["user_id"])){
                    echo
					'<li><a href="includes/login.php">Login</a></li>';
                    }
                else{
                    echo
					'<li>
                        <form action="includes/search_user.php" method="POST">
                        <label>
                            <button type="submit" name="submit">search</button>
                            </li><li>
                            <input type="text" name="username" placeholder="search username">
                        </label>
                    </form>
                    </li>
                    <li><a href="includes/logout.php">Logout</a></li>
					<li><a href="profile.php">Profile</a></li>
					<li><a href="friends_page.php">Friends</a></li>
					<li><a href="newsfeed_page.php">Newsfeed</a></li>';
                }
				echo 
               '</ul>
			</nav>
			<nav class="horizontalimg">
                <a href="index.php" class="img"><img src="images/leaf.png"></a>
			</nav>
			</div>
	<br><br><br>
    <section id="page">
    <div class="main-container">
    <div class="fixer-container">';
}