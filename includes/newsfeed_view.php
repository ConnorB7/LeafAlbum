<?php

function get_newsfeed(object $pdo, int $user_id){
    if(isset($_GET["profile"])){
		$following[] = get_user_id($pdo, $_GET["profile"]);
    }
		elseif(isset($_GET["account"])){
			$following[] = get_user_id($pdo, $_GET["account"]);
    }
    else{
		$following = get_following_list($pdo, $user_id);
    }
	$followings_posts = get_following_posts($pdo, $following);
    echo '<img src="../images/newsfeed.png"><article class="all-articles">';
    foreach($followings_posts as $posts){
        echo '<br><article class="main-container">';
        if(isset($posts["note_id"])){
            $post_data = get_note_data($pdo, $posts["note_id"]);
            echo "<h5>Note</h5><a href=profile.php?profile=" . $post_data["username"] . "><h4>" . 
            $post_data["username"] . 
            "</h4></a><a href=notes_page.php?note=" . $posts["note_id"] . "><h4>" . 
            $post_data["title"] . 
            "</h4></a><br>
            uploaded at: ". 
            $post_data["uploaded_at"] . 
            "<br>" . 
            $post_data["note"] . 
            "<br>";
        }
        elseif(isset($posts["image_id"])){
            $post_data = get_image_data($pdo, $posts["image_id"]);
            echo "<h5>Image</h5><a href=profile.php?profile=" . $post_data["username"] . "><h4>" . 
            $post_data["username"] . 
            "</h4></a><a href=images_page.php?image=" . $posts["image_id"] . "><h4>" . 
            $post_data["title"] . 
            "</h4></a><br>
            uploaded at: ". 
            $post_data["uploaded_at"] . 
            "<br>" . 
            '<img src="includes/uploads/'. 
            $post_data["image_id"] .
            '" alt="' . 
            $post_data["title"] . '" 
            width="500" height="333">
            <br>';
        }
        elseif(isset($posts["plant_id"])){
            $post_data = get_plant_data($pdo, $posts["plant_id"]);
            echo "<h5>Plant</h5><a href=profile.php?profile=" . $post_data["username"] . "><h4>" . 
            $post_data["username"] . 
            "</h4></a><a href=plants_page.php?plant=" . $posts["plant_id"] . "><h4>" . 
            $post_data["title"] . 
            "</h4></a><br>" .
            $post_data["plant_type"] . 
            "<br>planted at: " . 
            $post_data["plant_date"] . 
            "<br>harvest date: " .
             $post_data["harvest_date"]. 
             "<br>uploaded at: ". 
            $post_data["uploaded_at"] . 
            "<br>";
        }
        echo "</article class = 'main-container'>";
    }
    echo "<br></article class='all-articles'>";
}

function get_images(object $pdo, int $user_id){
	$following[] = $user_id;
	$followings_posts = get_following_posts($pdo, $following);
    echo '<br><br>
    <article class="all-articles">
        <br>
        <h1 class="dark-green">' . get_username_from_user_id($pdo, $user_id ).'\'s
            <br>
        Images</h1>';
        foreach($followings_posts as $post_data){
            echo '<br><article class="main-container">';
            if(isset($post_data["image_id"])){
                $post_data = get_image_data($pdo, $post_data["image_id"]);
                echo "<h5>Image</h5><a href=profile.php?profile=" . $post_data["username"] . "><h4>" . 
                $post_data["username"] . 
                "</h4></a><a href=images_page.php?image=" . $post_data["image_id"] . "><h4>" . 
                $post_data["title"] . 
                "</h4></a><br>
                uploaded at: ". 
                $post_data["uploaded_at"] . 
                "<br>" . 
                '<img src="includes/uploads/'. 
                $post_data["image_id"] .
                '" alt="' . 
                $post_data["title"] . '" 
                width="500" height="333">
                <br>';
            }
        echo "</article class = 'main-container'>";
    }
    echo "</article class='all-articles'>";
}

function get_image(object $pdo, String $image_id){
    $image_info = get_image_data($pdo, $image_id);
    echo "
    <br><br>
    <article class='all-articles'>
    <br>
        <article class='main-container'>
            <br>
            <h5>
                Image
            </h5>
            <a href=profile.php?profile=" . $image_info["username"] . ">
                <h4>" . 
                    $image_info["username"] . 
                "</h4>
            </a>
            <a href=images_page.php?image=" . $image_info["image_id"] . "><h4>" . 
            $image_info["title"] . 
            "</h4></a><br>
            uploaded at: ". 
            $image_info["uploaded_at"] . 
            "<br>" . 
            '<img src="includes/uploads/'. 
            $image_info["image_id"] .
            '" alt="' . 
            $image_info["title"] . 
            '"width="500" height="333">
            <br>';
        echo "</article class = 'main-container'>
        <br>
    </article class='all-articles'>";
}

function get_image_from_id(object $pdo, String $user_id){
    $following[] = $user_id;
	$followings_posts = get_following_posts($pdo, $following);
    echo '<br><br><br><br><h4>Your Images</h4><br><br><article class="all-articles">';
    foreach($followings_posts as $post_data){
        echo '<article class="main-container">';
        if(isset($post_data["image_id"])){
            $post_data = get_image_data($pdo, $post_data["image_id"]);
            echo "<h5>Image</h5><a href=profile.php?profile=" . $post_data["username"] . "><h4>" . 
            $post_data["username"] . 
            "</h4></a><a href=images_page.php?image=" . $post_data["image_id"] . "><h4>" . 
            $post_data["title"] . 
            "</h4></a><br>
            uploaded at: ". 
            $post_data["uploaded_at"] . 
            "<br>" . 
            '<img src="includes/uploads/'. 
            $post_data["image_id"] .
            '" alt="' . 
            $post_data["title"] . '" 
            width="500" height="333">
            <br>';
        }
        echo "</article class = 'main-container'>";
    }
    echo "</article class='all-articles'>";
}

function get_notes(object $pdo, int $user_id){
	$following[] = $user_id;
	$followings_posts = get_following_posts($pdo, $following);
    echo '<br><br><br><br>
    <br><br>    
    <article class="all-articles">
        <br>
        <h1 class="dark-green">' . get_username_from_user_id($pdo, $user_id ).'\'s
            <br>
        Notes</h1>';
        foreach($followings_posts as $post_data){
            echo '<article class="main-container">';
            if(isset($post_data["note_id"])){
                $post_data = get_note_data($pdo, $post_data["note_id"]);
                echo "<h5>Note</h5><a href=profile.php?profile=" . $post_data["username"] . "><h4>" . 
                $post_data["username"] . 
                "</h4></a><a href=notes_page.php?note=" . $post_data["note_id"] . "><h4>" . 
                $post_data["title"] . 
                "</h4></a><br>
                uploaded at: ". 
                $post_data["uploaded_at"] . 
                "<br>" . 
                $post_data["note"] . 
                "<br>";
            }
        echo "</article class = 'main-container'>";
    }
    echo "<br></article class='all-articles'>";
}

function get_note(object $pdo, String $note_id){
    $note_info = get_note_data($pdo, $note_id);
    echo "
    <br><br>
    <article class='all-articles'>
    <br>
        <article class='main-container'>
            <br>
            <h5>
                Note
            </h5>
            <a href=profile.php?profile=" . $note_info["username"] . ">
                <h4>" . 
                    $note_info["username"] . 
                "</h4>
            </a>
            <a href=notes_page.php?note=" . $note_info["note_id"] . "><h4>" . 
            $note_info["title"] . 
            "</h4></a><br>
            uploaded at: ". 
            $note_info["uploaded_at"] . 
            "<br>" . 
            $note_info["note"] . 
            "<br>";
        echo "</article class = 'main-container'>
    <br></article class='all-articles'>";
}

function get_plants(object $pdo, int $user_id){
	$following[] = $user_id;
	$followings_posts = get_following_posts($pdo, $following);
    echo '<br><br><br><br>
    <br><br>    <article class="all-articles">
        <br>
        <h1 class="dark-green">' . get_username_from_user_id($pdo, $user_id ).'\'s
            <br>
        Plants</h1>';
    foreach($followings_posts as $post_data){
        echo '<article class="main-container">';
        if(isset($post_data["plant_id"])){
            $post_data = get_plant_data($pdo, $post_data["plant_id"]);
            echo "<h5>Plant</h5><a href=profile.php?profile=" . $post_data["username"] . "><h4>" . 
            $post_data["username"] . 
            "</h4></a><a href=plants_page.php?plant=" . $post_data["plant_id"] . "><h4>" . 
            $post_data["title"] . 
            "</h4></a><br>" .
            $post_data["plant_type"] . 
            "<br>planted at: " . 
            $post_data["plant_date"] . 
            "<br>harvest date: " .
            $post_data["harvest_date"]. 
            "<br>uploaded at: ". 
            $post_data["uploaded_at"] . 
            "<br>";
        }
        echo "</article class = 'main-container'>";
    }
    echo "<br></article class='all-articles'>";
}

function get_plant(object $pdo, String $plant_id){
    $plant_info = get_plant_data($pdo, $plant_id);
    echo "
    <br><br>
    <article class='all-articles'>
    <br>
        <article class='main-container'>
            <br>
            <h5>
                Plant
            </h5>
            <a href=profile.php?profile=" . $plant_info["username"] . ">
                <h4>" . 
                    $plant_info["username"] . 
                "</h4>
            </a>
            <a href=plants_page.php?plant=" . $plant_info["plant_id"] . "><h4>" . 
            $plant_info["title"] . 
            "</h4></a><br>" .
            $plant_info["plant_type"] . 
            "<br>planted at: " . 
            $plant_info["plant_date"] . 
            "<br>harvest date: " .
            $plant_info["harvest_date"]. 
            "<br>uploaded at: ". 
            $plant_info["uploaded_at"] . 
            "<br>";
        echo "</article class = 'main-container'>
    <br></article class='all-articles'>";
}