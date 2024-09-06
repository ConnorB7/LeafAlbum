<?php

function retrieve_follow_requests(object $pdo, string $user_id){
    $query = "SELECT pf.id, pf.user_id, pf.follow_id, users.username 
    FROM pending_follows as pf
    INNER JOIN users as users
    ON pf.follow_id = users.id
    WHERE pf.user_id = :user_id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();
    return $stmt->fetchALL(PDO::FETCH_ASSOC);        
}

function remove_pending_follow(object $pdo, string $pending_follow_id){
    $query = "DELETE FROM pending_follows WHERE id = :id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":id", $pending_follow_id);
	$stmt->execute();

	return $stmt->fetch(PDO::FETCH_ASSOC);
}

function enact_follow(object $pdo, int $pending_id){
    $query = "SELECT * FROM pending_follows WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $pending_id);
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    $follower_id = $results['follow_id'];
    $follow_id = $results['user_id'];
    add_follower($pdo, $follow_id, $follower_id);
    add_following($pdo, $follower_id, $follow_id);
    
}

function add_follower(object $pdo, int $user_id, int $follower_id){
	$query = "INSERT INTO followers (user_id, follower_id) VALUES
	(:user_id, :follower_id);"; 
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":follower_id", $follower_id);
    $stmt->execute();   
}

function add_following(object $pdo, int $user_id, int $following_id){
	$query = "INSERT INTO followings (user_id, following_id) VALUES
	(:user_id, :following_id);"; 
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":following_id", $following_id);
    $stmt->execute();   
}