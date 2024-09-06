<?php

declare(strict_types=1);

require_once 'config_session.php';

function remove_image_database_entry(object $pdo, string $id){
    $query = "DELETE FROM images WHERE id = :id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":id", $id);
	$stmt->execute();

	return $stmt->fetch(PDO::FETCH_ASSOC);
}

function remove_image_file(string $id){
    unlink('uploads/' . $id);
}

