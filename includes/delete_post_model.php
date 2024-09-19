<?php

function delete_image_entry(object $pdo, string $image_id){
    $file = "uploads/" . $image_id;
    unlink($file);

    $query = "DELETE FROM images WHERE id = :id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":id", $image_id);
	$stmt->execute();    
}

function delete_note_entry(object $pdo, string $image_id){
    $query = "DELETE FROM notes WHERE id = :id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":id", $image_id);
	$stmt->execute();    
}

function delete_plant_entry(object $pdo, string $image_id){
    $query = "DELETE FROM plants WHERE id = :id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":id", $image_id);
	$stmt->execute();    
}