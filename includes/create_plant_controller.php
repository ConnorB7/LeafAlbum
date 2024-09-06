<?php

function create_plant(object $pdo, int $user_id, string $title,
 string $plant_type, string $plant_date, string $harvest_date){
    set_plant($pdo, $user_id, $title, $plant_type, $plant_date, $harvest_date);
}