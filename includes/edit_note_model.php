<?php

function edit_note_content($pdo, int $note_id, string $note){
    $query = "UPDATE notes SET note = :note WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":note", $note);
    $stmt->bindParam(":id", $note_id);
    $stmt->execute();
}