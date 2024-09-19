<?php

function like_post(object $pdo, int $user_id, $post_id, string $type){
    if($type == 'image'){
        if(is_liked_by_user($pdo, $user_id, $post_id, $type)){
            unlike_image($pdo, $user_id, $post_id);
        }
        else{
        like_image($pdo, $user_id, $post_id);
        }
    }
    if($type == 'note'){
        if(is_liked_by_user($pdo, $user_id, $post_id, $type)){
            unlike_note($pdo, $user_id, $post_id);
        }
        else{
        like_note($pdo, $user_id, $post_id);
        }       
    }
    if($type == 'plant'){
        if(is_liked_by_user($pdo, $user_id, $post_id, $type)){
            unlike_plant($pdo, $user_id, $post_id);
        }
        else{
        like_plant($pdo, $user_id, $post_id);
        }     
    }
}

function is_liked_by_user(object $pdo, int $user_id, $post_id, string $type){
    if($type == 'image'){
        return image_liked($pdo, $user_id, $post_id);
    }
    if($type == 'note'){
        return note_liked($pdo, $user_id, $post_id);        
    }
    if($type = 'plant'){
        return plant_liked($pdo, $user_id, $post_id);        
    }    
}

function is_post_public(object $pdo, $post_id, string $type){
    if($type == 'image'){
        return image_is_public($pdo, $post_id);
    }
    if($type == 'note'){
        return note_is_public($pdo, $post_id);        
    }
    if($type = 'plant'){
        return plant_is_public($pdo, $post_id);        
    }    
}

function is_user_following_poster(object $pdo, $post_id, int $user_id, string $type){
    if($type == 'image'){
        $image_user_id = get_image_user_id($pdo, $post_id);
        return user_is_following($pdo, $user_id, $image_user_id);
    }
    if($type == 'note'){
        $note_user_id = get_note_user_id($pdo, $post_id);
        return user_is_following($pdo, $user_id, $note_user_id);     
    }
    if($type = 'plant'){
        $plant_user_id = get_plant_user_id($pdo, $post_id);
        return user_is_following($pdo, $user_id, $plant_user_id);     
    }    
}