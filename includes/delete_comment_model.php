<?php

function delete_comment_entry(object $pdo, int $id){
    $query = "DELETE FROM comments WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}