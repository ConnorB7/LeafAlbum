<?php

require_once 'create_note_model.php';

function create_note(object $pdo, int $user_id, string $title,
$plant_title, string $note, string $user_date){
    set_note($pdo, $user_id, $title, $plant_title, $note, $user_date);
}