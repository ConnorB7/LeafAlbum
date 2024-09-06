<?php

declare(strict_types=1);

function link_image_to_plant(object $pdo, string $image_title, string $plant_title, int $user_id){
    return upload_link_image_to_plant($pdo, $image_title, $plant_title, $user_id);
}