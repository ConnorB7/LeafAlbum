<?php

declare(strict_types=1);

require_once 'config_session.php';

function follow_submit(object $pdo, string $user, string $to_follow){
	$query = "SELECT * FROM users WHERE username = :username;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":username", $to_follow);
	$stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $to_follow = $result['id'];
	if($result['private']){
        $query = "INSERT INTO pending_follows (user_id, follow_id) VALUES
        (:user_id, :follower_id);";
        $stmt = $pdo->prepare($query); 
        $stmt->bindParam(":user_id", $to_follow);
        $stmt->bindParam(":follower_id", $user);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    else{
        $query = "INSERT INTO followings (user_id, following_id) VALUES
        (:user_id, :following_id);";
        $stmt = $pdo->prepare($query); 
        $stmt->bindParam(":user_id", $user);
        $stmt->bindParam(":following_id", $to_follow);
        $stmt->execute();

        $query = "INSERT INTO followers (user_id, follower_id) VALUES
        (:user_id, :follower_id);";
        $stmt = $pdo->prepare($query); 
        $stmt->bindParam(":user_id", $to_follow);
        $stmt->bindParam(":follower_id", $user);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}