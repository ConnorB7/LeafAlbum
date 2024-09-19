<?php

function get_follow_data(object $pdo, int $follow_id){
    $query = "SELECT * FROM followers WHERE id = :id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":id", $follow_id);
	$stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function delete_follow(object $pdo, int $follow_id, int $following_user_id, int $following_following_id){
    $query = "DELETE FROM followings WHERE user_id = :user_id AND following_id = :following_id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":user_id", $following_user_id);
    $stmt->bindParam(":following_id", $following_following_id);
	$stmt->execute();    

    $query = "DELETE FROM followers WHERE id = :id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":id", $follow_id);
	$stmt->execute();
}