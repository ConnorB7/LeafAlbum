<?php

function get_image_likes(object $pdo, string $image_id){
    $query = 
    "SELECT user_id
    FROM likes
    where image_id = :image_id";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":image_id", $image_id);
    $stmt->execute();
    $results = $stmt->fetchall(\PDO::FETCH_ASSOC);

    return $results;
}

function get_note_likes(object $pdo, string $note_id){
    $query = 
    "SELECT *
    FROM likes
    where note_id = :note_id";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":note_id", $note_id);
    $stmt->execute();
    $results = $stmt->fetchall(\PDO::FETCH_ASSOC);

    return $results;
}

function get_plant_likes(object $pdo, string $plant_id){
    $query = 
    "SELECT *
    FROM likes
    where plant_id = :plant_id";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":plant_id", $plant_id);
    $stmt->execute();
    $results = $stmt->fetchall(\PDO::FETCH_ASSOC);

    return $results;
}

function unlike_image(object $pdo, int $user_id, string $image_id){
    $query = "DELETE FROM likes
    WHERE user_id = :user_id AND image_id = :image_id";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":image_id", $image_id);
    $stmt->execute();
}

function unlike_note(object $pdo, int $user_id, string $note_id){
    $query = "DELETE FROM likes
    WHERE user_id = :user_id AND note_id = :note_id";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":note_id", $note_id);
    $stmt->execute();
}

function unlike_plant(object $pdo, int $user_id, string $plant_id){
    $query = "DELETE FROM likes
    WHERE user_id = :user_id AND plant_id = :plant_id";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":plant_id", $plant_id);
    $stmt->execute();
}

function like_image(object $pdo, int $user_id, string $image_id){
    $query = "INSERT INTO likes (user_id, image_id)
    VALUES (:user_id, :image_id);";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":image_id", $image_id);
    $stmt->execute();
}

function like_note(object $pdo, int $user_id, int $note_id){
    $query = "INSERT INTO likes (user_id, note_id)
    VALUES (:user_id, :note_id);";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":note_id", $note_id);
    $stmt->execute();
}

function like_plant(object $pdo, int $user_id, string $plant_id){
    $query = "INSERT INTO likes (user_id, plant_id)
    VALUES (:user_id, :plant_id);";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":plant_id", $plant_id);
    $stmt->execute();
}

function image_liked(object $pdo, int $user_id, string $image_id){
    $query = "SELECT * FROM likes WHERE user_id = :user_id AND image_id = :image_id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":image_id", $image_id);
	$stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result){
        return true;
    }
    else{
        return false;
    }
}

function note_liked(object $pdo, int $user_id, string $note_id){
    $query = "SELECT * FROM likes WHERE user_id = :user_id AND note_id = :note_id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":note_id", $note_id);
	$stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result){
        return true;
    }
    else{
        return false;
    }
}

function plant_liked(object $pdo, int $user_id, string $plant_id){
    $query = "SELECT * FROM likes WHERE user_id = :user_id AND plant_id = :plant_id;";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":plant_id", $plant_id);
	$stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result){
        return true;
    }
    else{
        return false;
    }
}

function image_is_public($pdo, $post_id){
    $query = "SELECT user_id FROM images WHERE id = :id";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":id", $post_id);
	$stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);  
    $user_id = $result["user_id"];

    $query = "SELECT private FROM users WHERE id = :id";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":id", $user_id);
	$stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC); 

    if($result["private"] === 0){
        return true;
    }
    if($result["private"] === 1){
        return false;
    }
}

function note_is_public($pdo, $post_id){
    $query = "SELECT user_id FROM notes WHERE id = :id";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":id", $post_id);
	$stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);  
    $user_id = $result["user_id"];

    $query = "SELECT private FROM users WHERE id = :id";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":id", $user_id);
	$stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC); 

    if($result["private"] === 0){
        return true;
    }
    if($result["private"] === 1){
        return false;
    }
}

function plant_is_public($pdo, $post_id){
    $query = "SELECT user_id FROM plants WHERE id = :id";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":id", $post_id);
	$stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);  
    $user_id = $result["user_id"];

    $query = "SELECT private FROM users WHERE id = :id";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":id", $user_id);
	$stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC); 

    if($result["private"] === 0){
        return true;
    }
    if($result["private"] === 1){
        return false;
    }
}