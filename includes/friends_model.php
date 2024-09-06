<?php

function retrieve_friends(object $pdo, string $username) 
{
	$query = "SELECT username FROM users WHERE username != :username;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":username", $username);
	$stmt->execute();
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
	return $result;
}