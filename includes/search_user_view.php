<?php

function display_invalid_username($searched_username){
    echo "<p>The username: " . htmlspecialchars($searched_username) . " does not exist.</p>";
}