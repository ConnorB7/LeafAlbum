<?php

require_once 'account_privacy_setting_model.php';

function set_privacy_setting(object $pdo, string $setting, string $user_id){
    if($setting === "private"){
        change_privacy_setting($pdo, 1, $user_id);
    }
    elseif($setting === "public"){
        change_privacy_setting($pdo, 0, $user_id);
    }
}

function get_privacy_status(object $pdo, string $user_id){
    $result = retrieve_privacy_setting($pdo, $user_id);
    if($result["private"] === 0){
        return "public";
    }
    elseif($result["private"] === 1){
        return "private";
    }
    return "??";
}