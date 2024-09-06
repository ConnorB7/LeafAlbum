<?php

declare(strict_types=1);

require_once 'follow_model.php';

function follow_request(object $pdo, string $user, string $to_follow){
    follow_submit($pdo, $user, $to_follow);
}