<?php

function retrieve_notes(object $pdo, string $user_id)
{
	$query = "SELECT * FROM notes WHERE user_id = :user_id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":user_id", $user_id);
	$stmt->execute();
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
	return $result;
}

function delete_note(object $pdo, int $note_id){
	$query = "DELETE FROM notes WHERE id = :id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":id", $note_id);
	$stmt->execute();

	return $stmt->fetch(PDO::FETCH_ASSOC);
}
