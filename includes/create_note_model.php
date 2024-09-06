<?php

function set_note(object $pdo, int $user_id, string $title,
$plant_title, string $note, string $user_date){
	if(isset($plant_title)){
			$plant_id = get_plant_id($pdo, $plant_title, $user_id);
	}
	if($user_date != null){
		$query = "INSERT INTO notes (id, user_id, title, plant_id, note, user_date) VALUES
		(:id, :user_id, :title, :plant_id, :note, :user_date);";
		$stmt = $pdo->prepare($query); 
		$stmt->bindParam(":user_date", $user_date);
	}else{
		$query = "INSERT INTO notes (id, user_id, title, plant_id, note) VALUES
		(:id, :user_id, :title, :plant_id, :note);";
		$stmt = $pdo->prepare($query);
	}


	$stmt->bindParam(":id", $id);
	$stmt->bindParam(":user_id", $user_id);
	$stmt->bindParam(":title", $title);
	$stmt->bindParam(":plant_id", $plant_id);
  $stmt->bindParam(":note", $note);

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