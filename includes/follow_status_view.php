<?php


require_once 'follow_status_model.php';

function follow_status(object $pdo, string $user, int $follower){
    $status = check_follow_status($pdo, $user, $follower);
    return $status;
}

function is_private(object $pdo, string $username){
    $privacy_status = check_privacy_status($pdo, $username);
    return $privacy_status;
}