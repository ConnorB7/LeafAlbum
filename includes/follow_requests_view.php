<?php

require_once 'follow_requests_model.php';
require_once 'follow_cancel_pending_model.php';

function recieve_follow_requests(object $pdo, string $user_id){
    $requests = retrieve_follow_requests($pdo, $user_id);
    if($requests){
        foreach($requests as $request){
            echo "<br>";
            echo $request["username"] .
            '<form action="includes/follow_requests.php?accept='. $request["id"] .'"
            method="POST" ENCTYPE="multipart/form-data">
            <button type="submit" name="submit">accept</button>
            </form>
            <form action="includes/follow_requests.php?deny='. $request["id"] .'"
            method="POST" ENCTYPE="multipart/form-data">
            <button type="submit" name="submit">deny</button>
            </form>';
        }
    }
    else{
        echo "<p>You have no pending folllow requests.</p>";
    }
}