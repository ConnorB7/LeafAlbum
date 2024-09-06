<?php

function change_privacy_setting(object $pdo, int $setting, $user_id){
    $query = "UPDATE users SET private =
    :setting WHERE id = :id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":id", $user_id);
    $stmt->bindParam(":setting", $setting);
	$stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
}

function retrieve_privacy_setting(object $pdo, int $user_id){
    $query = "SELECT private FROM users WHERE id = :id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":id", $user_id);
	$stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;   
}