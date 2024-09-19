<?php

function get_followers(object $pdo, int $user_id){
    $query = "SELECT * FROM followers WHERE user_id = :user_id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":user_id", $user_id);
	$stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $result;
}

function get_pending_followers(object $pdo, int $user_id){
    $query = "SELECT * FROM pending_follows WHERE user_id = :user_id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":user_id", $user_id);
	$stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $result;
}