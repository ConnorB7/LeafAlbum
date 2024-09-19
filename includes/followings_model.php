<?php

function get_followings(object $pdo, int $user_id){
    $query = "SELECT * FROM followings WHERE user_id = :user_id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":user_id", $user_id);
	$stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $result;
}