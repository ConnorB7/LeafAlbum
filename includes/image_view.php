<?php

require_once 'image_model.php';


function display_images($pdo){
    $images = [];
    $images = retrieve_images($pdo, $_SESSION["user_id"]);
    echo "<br>";
    foreach($images as $image)
    echo htmlspecialchars($image['title']) . '<br>
    <img src="includes/uploads/'. $image["id"] .'" alt="'
    . htmlspecialchars($image["title"]) .'" width="500" height="333"> <br>
    <form action="includes/image_manage.php?image_id='
    . htmlspecialchars($image["id"]) . '" method="POST" ENCTYPE="multipart/form-data">
        <button type="submit" name="submit">delete</button>
    </form>'; 
}