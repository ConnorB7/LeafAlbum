<?php

function get_following_list($pdo, $user_id){
    $query = "SELECT following_id FROM followings WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();
    $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    $following_ids = [];
    foreach($results as $result){
        $following_ids[] = $result["following_id"];
    }
    return $following_ids;
}

function get_user_id(object $pdo, string $username){
    $query = "SELECT id FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $results = $stmt->fetch(\PDO::FETCH_ASSOC);
    return $results["id"];
}

function get_following_posts(object $pdo, $following_ids){
    $results = [];
        foreach($following_ids as $user_id){

        $images_query = 
        "SELECT users.id as users_id, images.id as image_id, images.uploaded_at FROM users
        JOIN images
        on images.user_id = users.id
        where users.id = :user_id";

        $images_stmt = $pdo->prepare($images_query);
        $images_stmt->bindParam(":user_id", $user_id);
        $images_stmt->execute();
        $images_results = $images_stmt->fetchAll(\PDO::FETCH_ASSOC);

        foreach($images_results as $result){
            $results[] = $result;
        }

        $notes_query = 
        "SELECT users.id as user_id, notes.id as note_id, notes.uploaded_at FROM users
        JOIN notes
        on notes.user_id = users.id
        where users.id = :user_id";

        $notes_stmt = $pdo->prepare($notes_query);
        $notes_stmt->bindParam(":user_id", $user_id);
        $notes_stmt->execute();
        $notes_results = $notes_stmt->fetchAll(\PDO::FETCH_ASSOC);

        foreach($notes_results as $result){
            $results[] = $result;
        }

        $plants_query = 
        "SELECT users.id as user_id, plants.id as plant_id, plants.uploaded_at FROM users
        JOIN plants
        on plants.user_id = users.id
        where user_id = :user_id;";

        $plants_stmt = $pdo->prepare($plants_query);
        $plants_stmt->bindParam(":user_id", $user_id);
        $plants_stmt->execute();
        $plants_results = $plants_stmt->fetchAll(\PDO::FETCH_ASSOC);

        foreach($plants_results as $result){
            $results[] = $result;
        }
}

    function compare_time($a, $b)
    {
        return strnatcmp($b['uploaded_at'], $a['uploaded_at']);
    }

    // sort alphabetically by name
    usort($results, 'compare_time');

    return $results;
}

function get_note_data(object $pdo, int $note_id){
    $query = 
    "SELECT users.id as user_id, notes.id as note_id, notes.title, notes.uploaded_at,
    notes.user_date, notes.note, notes.plant_id, users.username FROM notes
    JOIN users
    on notes.user_id = users.id
    where notes.id = :note_id";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":note_id", $note_id);
    $stmt->execute();
    $results = $stmt->fetch(\PDO::FETCH_ASSOC);
    return $results;
}

function get_image_data(object $pdo, string $image_id){
    $query = 
    "SELECT users.id as user_id, images.id as image_id, images.title, images.uploaded_at,
    images.user_date, images.plant_id, users.username FROM images
    JOIN users
    on images.user_id = users.id
    where images.id = :image_id";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":image_id", $image_id);
    $stmt->execute();
    $results = $stmt->fetch(\PDO::FETCH_ASSOC);
    return $results;
}

function get_plant_data(object $pdo, int $plant_id){
    $query = 
    "SELECT users.id as user_id, plants.id as plant_id, plants.title, plants.plant_type,
    plants.plant_date, plants.harvest_date, plants.uploaded_at, users.username 
    FROM plants
    JOIN users
    on plants.user_id = users.id
    where plants.id = :plant_id";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":plant_id", $plant_id);
    $stmt->execute();
    $results = $stmt->fetch(\PDO::FETCH_ASSOC);
    return $results;
}

function get_user_id_from_image_id($pdo, $image_id){
    $query = "SELECT user_id FROM images WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $image_id);
    $stmt->execute();
    $results = $stmt->fetch(\PDO::FETCH_ASSOC);
    return $results["user_id"];
}

function get_user_id_from_note_id($pdo, $note_id){
    $query = "SELECT user_id FROM notes WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $note_id);
    $stmt->execute();
    $results = $stmt->fetch(\PDO::FETCH_ASSOC);
    return $results["user_id"];
}

function get_user_id_from_plant_id($pdo, $plant_id){
    $query = "SELECT user_id FROM plants WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $plant_id);
    $stmt->execute();
    $results = $stmt->fetch(\PDO::FETCH_ASSOC);
    return $results["user_id"];
}

function get_username_from_user_id($pdo, $user_id){
    $query = "SELECT username FROM users WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $user_id);
    $stmt->execute();
    $results = $stmt->fetch(\PDO::FETCH_ASSOC);
    return $results["username"];    
}