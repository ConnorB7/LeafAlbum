<?php

function set_plant(object $pdo, int $user_id, string $title,
string $plant_type, string $plant_date, string $harvest_date){
	$query = "INSERT INTO plants (id, user_id, title, plant_type, plant_date, harvest_date) VALUES
	(:id, :user_id, :title, :plant_type, :plant_date, :harvest_date);";
	$stmt = $pdo->prepare($query); 

	$stmt->bindParam(":id", $id);
	$stmt->bindParam(":user_id", $user_id);
	$stmt->bindParam(":title", $title);
	$stmt->bindParam(":plant_type", $plant_type);
	$stmt->bindParam(":plant_date", $plant_date);
    $stmt->bindParam(":harvest_date", $harvest_date);

	$stmt->execute();

	return $stmt->fetch(PDO::FETCH_ASSOC);
}