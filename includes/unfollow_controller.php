<?php

require_once 'unfollow_model.php';
require_once 'follow_status_model.php';

function unfollow_request(object $pdo, int $user_id, string $following_username){
    $following_id = get_user_id_from_username($pdo, $following_username);
    unfollow_user($pdo, $user_id, $following_id);
}