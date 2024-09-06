<?php

function retrieve_plants(object $pdo, int $user_id)
{
	$query = "SELECT * FROM plants WHERE user_id = :user_id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":user_id", $user_id);
	$stmt->execute();
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
	return $result;
}

function delete_plant(object $pdo, int $plant_id){
	$query = "DELETE FROM plants WHERE id = :id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":id", $plant_id);
	$stmt->execute();

	return $stmt->fetch(PDO::FETCH_ASSOC);
}