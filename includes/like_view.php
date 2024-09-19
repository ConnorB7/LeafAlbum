<?php

function display_likes(object $pdo, $id, string $type){
    echo "<article>";
    if($type === "image"){
        $likes = get_image_likes($pdo, $id);
        echo "<article class='main-article'><h1>";
        if($likes){
            foreach($likes as $like){
                display_like($pdo, $like);
            }
            echo "</h1></article>";
        }
    }
    else if($type === "note"){
        $likes = get_note_likes($pdo, $id);
        echo "<article class='main-article'><h1>";
        if($likes){
            foreach($likes as $like){
                display_like($pdo, $like);
            }       
            echo "</h1></article>"; 
        }
    }
    else if($type === "plant"){
        $likes = get_plant_likes($pdo, $id);
        echo "<article class='main-article'><h1>";
        if($likes){
            foreach($likes as $like){
                display_like($pdo, $like);
            }        
            echo "</h1></article>";
        }
    }
    echo "<br><br></article>";
}

function display_like($pdo, $like_id){
    echo '<a class="newsfeed_link" href=profile.php?profile="' . get_username_from_user_id($pdo, $like_id["user_id"]) . '>' .
    get_username_from_user_id($pdo, $like_id["user_id"]) . 
    '</a><br><br>';
}