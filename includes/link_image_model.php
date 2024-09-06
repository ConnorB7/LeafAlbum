<?php

declare(strict_types=1);

function upload_link_image_to_plant(object $pdo, string $image_title, string $plant_title, int $user_id){
    $plant_id = get_plant_id($pdo, $plant_title, $user_id);
    $image_id = get_image_id($pdo, $image_title, $user_id);
    if(!isset($plant_id))
        return "plant_error";
    if(!isset($image_id))
        return "plant_error";
    $query = "UPDATE images SET
    plant_id = :plant_id WHERE id = :id";
    $stmt = $pdo->prepare($query);
	$stmt->bindParam(":plant_id", $plant_id);
    $stmt->bindParam(":id", $image_id);
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

function get_image_id(object $pdo, string $image_title, int $user_id){
    $query = "SELECT id FROM images WHERE user_id = :user_id AND title = :title;";
    $stmt = $pdo->prepare($query);
	$stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":title", $image_title);
	$stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result["id"];
}