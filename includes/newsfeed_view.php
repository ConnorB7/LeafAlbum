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

    foreach($followings_posts as $posts){
        echo '<br>';
        echo '<br>';

        if(isset($posts["note_id"])){
            $note_data = get_note_data($pdo, $posts["note_id"]);
            echo "NOTE<br><a href=profile.php?profile=" . $note_data["username"] . ">" . 
            $note_data["username"] . "</a><br>" . $note_data["title"] . 
            "<br>uploaded at: ". $note_data["uploaded_at"] . "<br>" . $note_data["note"];
        }
        elseif(isset($posts["image_id"])){
            $image_data = get_image_data($pdo, $posts["image_id"]);
            echo "IMAGE<br><a href=profile.php?profile=" . $note_data["username"] . ">" . 
            $note_data["username"] . "</a><br>" . $image_data['title'] . '<br>uploaded at: '. 
            $image_data["uploaded_at"] . "<br>" . '<img src="includes/uploads/'. 
            $image_data["image_id"] .'" alt="'. $image_data["title"] . '" 
            width="500" height="333"> <br>';
        }
        elseif(isset($posts["plant_id"])){
            $plant_data = get_plant_data($pdo, $posts["plant_id"]);
            echo "PLANT<br><a href=profile.php?profile=" . $note_data["username"] . ">" . 
            $note_data["username"] . "</a><br>" . $plant_data["title"] . "<br>" . 
            $plant_data["plant_type"] . "<br>planted at: " . $plant_data["plant_date"] . 
            "<br>harvest date: " . $plant_data["harvest_date"]. "<br>uploaded at: ". 
            $plant_data["uploaded_at"];
        }
    }
}