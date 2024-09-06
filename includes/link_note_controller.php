<?php

declare(strict_types=1);

function link_note_to_plant(object $pdo, string $note_title, string $plant_title, int $user_id){
    return upload_link_note_to_plant($pdo, $note_title, $plant_title, $user_id);
}