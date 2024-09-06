<?php

function unfollow_user(object $pdo, int $user_id, int $following_id){
	$query = "DELETE FROM followings WHERE user_id = :user_id and following_id = :following_id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":following_id", $following_id);
	$stmt->execute();
    
    $query = "DELETE FROM followers WHERE user_id = :user_id and follower_id = :follower_id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":user_id", $following_id);
    $stmt->bindParam(":follower_id", $user_id);
	$stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
}