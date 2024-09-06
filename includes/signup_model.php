<?php

declare(strict_types=1);
 
function get_username(object $pdo, string $username) {
	$query = "SELECT username FROM users WHERE username = :username;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":username", $username);
	$stmt->execute();

	return $stmt->fetch(PDO::FETCH_ASSOC);
}

function get_email(object $pdo, string $email) {
	$query = "SELECT email FROM users WHERE email = :email;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":email", $email);
	$stmt->execute();
	

	return $stmt->fetch(PDO::FETCH_ASSOC);
}
function is_signup_code_incorrect(object $pdo, string $signup_code): bool
{
	$query = "SELECT signup_code FROM signup_codes WHERE signup_code = :signup_code;";
	$stmt = $pdo->prepare($query); 
	$options = [
		'cost' => 12
	];
	$hashed_signup_code = password_hash($signup_code, PASSWORD_BCRYPT, $options);
	$stmt->bindParam(":signup_code", $signup_code);
	$stmt->execute();
	
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	if($result){
		return false;
	}
	else{
		return true;
	}
}
	

function set_user(object $pdo, string $password, string $username, string $email) {
	$query = "INSERT INTO users (username, password, email) VALUES
	(:username, :password, :email);";
	$stmt = $pdo->prepare($query); 

	$options = [
		'cost' => 12
	];
	$hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);
	$stmt->bindParam(":username", $username);
	$stmt->bindParam(":password", $hashed_password);
	$stmt->bindParam(":email", $email);
	$stmt->execute();

	return $stmt->fetch(PDO::FETCH_ASSOC);
}