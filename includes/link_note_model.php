<?php

declare(strict_types=1);

function upload_link_note_to_plant(object $pdo, 
string $note_title, string $plant_title, int $user_id){
    $plant_id = get_plant_id($pdo, $plant_title, $user_id);
    $note_id = get_note_id($pdo, $note_title, $user_id);
    if(!isset($plant_id))
        return "plant_error";
    if(!isset($note_id))
        return "plant_error";
    $query = "UPDATE notes SET
    plant_id = :plant_id WHERE id = :id";
    $stmt = $pdo->prepare($query);
	$stmt->bindParam(":plant_id", $plant_id);
    $stmt->bindParam(":id", $note_id);
	$stmt->execute();
    return "successful link";  
}

function get_plant_id(object $pdo, string $plant_title, int $user_id){
    $query = "SELECT id FROM plants WHERE user_id = :user_id AND title = :title;";
    $stmt = $pdo->prepare($query);
	$stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":title", $plant_title);
	$stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result["id"];
}

function get_note_id(object $pdo, string $note_title, int $user_id){
    $query = "SELECT id FROM notes WHERE user_id = :user_id AND title = :title;";
    $stmt = $pdo->prepare($query);
	$stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":title", $note_title);
	$stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result["id"];
}