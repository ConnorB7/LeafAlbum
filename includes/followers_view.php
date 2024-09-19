<?php

function display_followers($pdo, $user_id){
    $followers = get_followers($pdo, $user_id);
    $_SESSION["return_url"] = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if($followers){
        echo "<article class='all-articles'><br>";
        foreach($followers as $follower){
            echo "<article class='main-container'><br><br>
                <h6>" . 
                    get_username_from_user_id($pdo, $follower['follower_id']) . 
                "</h6>
                <h3>
                    <a class='newsfeed_link' href=includes/delete_follow.php?follow_id=" . $follower["id"] . ">
                        Delete Follower
                    </a> 
                </h3>
                <br><br><br>
                </article>";
        }
        echo "<br>";
    }
}

function display_pending_followers($pdo, $user_id){
    $_SESSION["return_url"] = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $pending_followers = get_pending_followers($pdo, $user_id);
    if($pending_followers){
        echo "<article class='all-articles'><br>";
        foreach($pending_followers as $pending_follower){
            echo "<article class='main-container'><br><br>
                <h6>" . 
                    get_username_from_user_id($pdo, $pending_follower['follow_id']) . 
                "</h6>
                <h3>
                    <a class='newsfeed_link' href=includes/accept_pending_follow.php?follow_id=" . $pending_follower["id"] . ">
                        Accept
                    </a> 
                    <a class='newsfeed_link' href=includes/delete_pending_follow.php?follow_id=" . $pending_follower["id"] . ">
                        Deny
                    </a> 
                </h3>
                <br><br><br>
                </article>";
        }
        echo "<br>";
    }
}