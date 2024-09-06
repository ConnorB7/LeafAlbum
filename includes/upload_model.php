<?php

function upload_image(object $pdo, string $id, int $user_id, 
string $title, $plant_title, string $taken_at){
	if(isset($plant_title)){
	$plant_id = get_plant_id($pdo, $plant_title, $user_id);
	}
	$query = "INSERT INTO images (id, user_id, title, plant_id, user_date) VALUES
	(:id, :user_id, :title, :plant_id, :user_date);";
	$stmt = $pdo->prepare($query); 

	$stmt->bindParam(":id", $id);
	$stmt->bindParam(":user_id", $user_id);
	$stmt->bindParam(":title", $title);
	$stmt->bindParam(":plant_id", $plant_id);
	$stmt->bindParam(":user_date", $user_date);
	$stmt->execute();

	return $stmt->fetch(PDO::FETCH_ASSOC);
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