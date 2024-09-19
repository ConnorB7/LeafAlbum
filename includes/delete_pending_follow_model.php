<?php

function get_pending_follow_data($pdo, $pending_follow_id){
    $query = "SELECT * FROM pending_follows WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $pending_follow_id);
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}