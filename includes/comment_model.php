<?php

function get_image_comments(object $pdo, string $image_id){
    $query = 
    "SELECT user_id, comment, uploaded_at, image_id, id
    FROM comments
    where image_id = :image_id";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":image_id", $image_id);
    $stmt->execute();
    $results = $stmt->fetchall(\PDO::FETCH_ASSOC);

    return $results;
}

function get_note_comments(object $pdo, int $note_id){
    $query = 
    "SELECT user_id, comment, uploaded_at, note_id, id
    FROM comments
    where note_id = :note_id";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":note_id", $note_id);
    $stmt->execute();
    $results = $stmt->fetchall(\PDO::FETCH_ASSOC);

    return $results;
}

function get_plant_comments(object $pdo, int $plant_id){
    $query = 
    "SELECT user_id, comment, uploaded_at, plant_id, id
    FROM comments
    where plant_id = :plant_id";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":plant_id", $plant_id);
    $stmt->execute();
    $results = $stmt->fetchall(\PDO::FETCH_ASSOC);

    return $results;
}

function upload_image_comment(object $pdo, int $user_id, string $image_id, string $comment){
    $query = "INSERT INTO comments (user_id, image_id, comment)
    VALUES (:user_id, :image_id, :comment);";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":image_id", $image_id);
    $stmt->bindParam(":comment", $comment);
    $stmt->execute();
}

function upload_note_comment(object $pdo, int $user_id, int $note_id, string $comment){
    $query = "INSERT INTO comments (user_id, note_id, comment)
    VALUES (:user_id, :note_id, :comment);";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":note_id", $note_id);
    $stmt->bindParam(":comment", $comment);
    $stmt->execute();
}

function upload_plant_comment(object $pdo, int $user_id, int $plant_id, string $comment){
    $query = "INSERT INTO comments (user_id, plant_id, comment)
    VALUES (:user_id, :plant_id, :comment);";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":plant_id", $plant_id);
    $stmt->bindParam(":comment", $comment);
    $stmt->execute();
}