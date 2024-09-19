<?php

function delete_image(object $pdo, string $image_id){
    delete_image_entry($pdo, $image_id);
}

function delete_note(object $pdo, int $note_id){
    delete_note_entry($pdo, $note_id);
}

function delete_plant(object $pdo, int $plant_id){
    delete_plant_entry($pdo, $plant_id);
}