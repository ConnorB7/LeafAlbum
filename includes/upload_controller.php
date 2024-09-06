<?php

function create_image(object $pdo, string $file_name_new, int $user_id, 
string $title, $plant_title, string $taken_at){
    return upload_image( $pdo, $file_name_new, $user_id, 
    $title, $plant_title, $taken_at);
}
