<?php

require_once 'follow_status_model.php';

function remove_follow_pending(object $pdo, string $username, string $to_follow_id){
    $user_id = get_user_id_from_username($pdo, $username);

    $query = "DELETE FROM pending_follows WHERE user_id = :user_id AND follow_id = :follow_id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":follow_id", $to_follow_id);
	$stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
}