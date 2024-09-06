<?php

require_once 'plant_model.php';
require_once 'config_session.php';


function display_plants($pdo){
    $plants = [];
    $plants = retrieve_plants($pdo, $_SESSION["user_id"]);
    echo "<br>";
    foreach($plants as $plant)
    echo htmlspecialchars($plant['title']) . '<br>'
    . htmlspecialchars($plant['plant_type']) .  '<br>'
    . $plant['plant_date'] . '<br>' . $plant['harvest_date']
    . $plant['post_date'] . '
    <form action="includes/plant.php?plant_id='
    . htmlspecialchars($plant["id"]) . '" method="POST" ENCTYPE="multipart/form-data">
        <button type="submit" name="submit">delete</button>
    </form>'; 
}