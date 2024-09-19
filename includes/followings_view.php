<?php

function display_followings($pdo, $user_id){
    $followings = get_followings($pdo, $user_id);
    $_SESSION["return_url"] = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if($followings){
        echo "<article class='all-articles'><br>";
        foreach($followings as $following){
            echo "<article class='main-container'><br><br>
                <h6>" . 
                    get_username_from_user_id($pdo, $following['following_id']) . 
                "</h6>
                <h3>
                    <a class='newsfeed_link' href=includes/delete_follow.php?follow_id=" . $following["id"] . ">
                        unfollow
                    </a> 
                </h3>
                <br><br><br>
                </article>";
        }
        echo "<br>";
    }
}