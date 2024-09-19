<?php

function create_comment(object $pdo, $user_id, $id, string $comment, string $type){
    if($type === "image"){
        upload_image_comment($pdo, $user_id, $id, $comment);
    }
    else if($type === "note"){
        upload_note_comment($pdo, $user_id, (int)$id, $comment);        
    }
    else if($type === "plant"){
        upload_plant_comment($pdo, $user_id, (int)$id, $comment);        
    }
}