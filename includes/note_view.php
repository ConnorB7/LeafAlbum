<?php

require_once 'note_model.php';
require_once 'config_session.php';


function display_notes($pdo){
    $notes = [];
    $notes = retrieve_notes($pdo, $_SESSION["user_id"]);
    echo "<br>";
    foreach($notes as $note)
    echo htmlspecialchars($note['title']) . '<br>'
    . htmlspecialchars($note['note']) .  '<br>'
    . $note['uploaded_at'] . '
    <form action="includes/note.php?note_id='
    . htmlspecialchars($note["id"]) . '" method="POST" ENCTYPE="multipart/form-data">
        <button type="submit" name="submit">delete</button>
    </form>'; 
}