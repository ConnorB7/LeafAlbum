<?php

require_once 'follow_status_model.php';

function follow_status(object $pdo, string $user, string $follower){
    $status = check_follow_status($pdo, $user, $follower);
    return $status;
}