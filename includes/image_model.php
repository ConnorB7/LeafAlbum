<?php

function retrieve_images(object $pdo, string $user_id)
{
	$query = "SELECT * FROM images WHERE user_id = :user_id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":user_id", $user_id);
	$stmt->execute();
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
	return $result;
}