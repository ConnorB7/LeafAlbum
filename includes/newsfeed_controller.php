<?php

function get_image_user_id($pdo, $image_id){
    return get_user_id_from_image_id($pdo, $image_id);
}

function get_note_user_id($pdo, $image_id){
    return get_user_id_from_note_id($pdo, $image_id);
}

function get_plant_user_id($pdo, $image_id){
    return get_user_id_from_plant_id($pdo, $image_id);
}

function get_username_user_id($pdo, $username){
    return get_user_id($pdo, $username);
}

function get_post_user_id(object $pdo, $post_id, string $type){
    if($type === "image"){
        return get_user_id_from_image_id($pdo, $post_id);
    }
    if($type === "note"){
        return get_user_id_from_note_id($pdo, $post_id);
    }
    if($type === "plant"){
        return get_user_id_from_plant_id($pdo, $post_id);        
    }
}