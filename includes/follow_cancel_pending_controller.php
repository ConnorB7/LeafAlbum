<?php

require_once 'follow_cancel_pending_model.php';

function cancel_follow_pending(object $pdo, string $username, int $to_follow_user_id){
    remove_follow_pending($pdo, $username, $to_follow_user_id);
}