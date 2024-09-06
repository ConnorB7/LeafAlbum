<?php

declare(strict_types=1);

require_once 'config_session.php';

function check_follow_status(object $pdo, string $user, int $to_follow_id){

    $user_id = get_user_id_from_username($pdo, $user);

    $query = "SELECT * FROM followings WHERE user_id = :user_id AND following_id = :following_id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":user_id", $to_follow_id);
    $stmt->bindParam(":following_id", $user_id);
	$stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result){
        return "following";
    }
    else{
        $query = "SELECT * FROM pending_follows WHERE user_id = :user_id AND follow_id = :follow_id;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":follow_id", $to_follow_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);    
        if($result){
            return "pending";
        }
        else{
            return "not_following";
        }
    }
}

function check_privacy_status($pdo, $username){
    $user_id = get_user_id_from_username($pdo, $username);
    $query = "SELECT private FROM users WHERE id = :id";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":id", $user_id);
	$stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result["private"] == 1){
        return true;
    }
    else{
        return false;
    }
}

function get_user_id_from_username($pdo, $username){
	$query = "SELECT id FROM users WHERE username = :username;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":username", $username);
	$stmt->execute();
    $result = [];
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $user_id = $result['id'];
    return $user_id;
}