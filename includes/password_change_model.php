<?php

declare(strict_types=1);

function set_password(object $pdo, string $password){
    $query = "UPDATE users SET password =
    :pswd WHERE id = :id;";
    $stmt = $pdo->prepare($query); 

    $options = [
        'cost' => 12
    ];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);
    $stmt->bindParam(":pswd", $hashed_password);
    $stmt->bindParam(":id", $_SESSION["user_id"]);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function get_user(object $pdo, string $id) {
	$query = "SELECT * FROM users WHERE id = :id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":id", $id);
	$stmt->execute();

	return $stmt->fetch(PDO::FETCH_ASSOC);
}