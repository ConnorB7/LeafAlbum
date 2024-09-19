<?php

function edit_image_caption($pdo, string $image_id, string $caption){
    $query = "UPDATE images SET title = :title WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":title", $caption);
    $stmt->bindParam(":id", $image_id);
    $stmt->execute();
}

function edit_note_caption($pdo, int $note_id, string $caption){
    $query = "UPDATE notes SET title = :title WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":title", $caption);
    $stmt->bindParam(":id", $note_id);
    $stmt->execute();
}

function edit_plant_caption($pdo, int $plant_id, string $caption){
    $query = "UPDATE plants SET title = :title WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":title", $caption);
    $stmt->bindParam(":id", $plant_id);
    $stmt->execute();
}