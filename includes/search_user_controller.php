<?php

require_once 'search_user_model.php';

function search_user(object $pdo, string $username){
    return existing_username($pdo, $username);
}