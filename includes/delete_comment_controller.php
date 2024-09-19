<?php

function delete_comment(object $pdo, int $comment_id){
    delete_comment_entry($pdo, $comment_id);
}