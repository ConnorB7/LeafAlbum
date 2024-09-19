<?php

function display_comments(object $pdo, $id, string $type){
    echo "<article class='all-articles'><br>";
    if($type === "image"){
        $comments = get_image_comments($pdo, $id);
        echo '<article class="main-container">
        <h4>Create a comment</h4> 
        <br>
        <form action="includes/comment.php?image='. $_GET["image"] . '" method="POST" ENCTYPE="multipart/form-data">
            <label>
                <textarea name="comment" rows="4" cols="100" maxlength=2999></textarea>
            </label>
            <br>
            <button class="button" type="submit" name="submit">Upload</button>
        </form>
        <br>
        </article>';
        if($comments){
            foreach($comments as $comment){
                display_comment($pdo, $comment, $comment["user_id"]);
            }
            echo "<br>";
        }
    }
    else if($type === "note"){
        $comments = get_note_comments($pdo, $id);
        echo '<article class="main-container">
        <h4>Create a comment</h4> 
        <br>
        <form action="includes/comment.php?note='. $_GET["note"] . '" method="POST" ENCTYPE="multipart/form-data">
            <label>
                <textarea name="comment" rows="4" cols="100" maxlength=2999></textarea>
            </label>
            <br>
            <button class="button" type="submit" name="submit">Upload</button>
        </form>
        <br>
        </article>';
        if($comments){
            foreach($comments as $comment){
                display_comment($pdo, $comment, get_note_user_id($pdo, $comment["note_id"]));
            }      
            echo "<br>"; 
        }
    }
    else if($type === "plant"){
        $comments = get_plant_comments($pdo, $id);
        echo '<article class="main-container">
        <h4>Create a comment</h4> 
        <br>
        <form action="includes/comment.php?plant='. $_GET["plant"] . '" method="POST" ENCTYPE="multipart/form-data">
            <label>
                <textarea name="comment" rows="4" cols="50" maxlength=2999></textarea>
            </label>
            <br>
            <button class="button" type="submit" name="submit">Upload</button>
        </form>
        <br>
        </article>';
        if($comments){
            foreach($comments as $comment){

                display_comment($pdo, $comment, get_plant_user_id($pdo, $comment["plant_id"]));
            }   
            echo "<br>";
        }
    }
    echo "<br></article>";
}

function display_comment(object $pdo, $comment, int $user_id){
    $return_url = $_SESSION["return_url"];
    echo'
    <article class="main-container">
            <h4>
                <a class="newsfeed_link" href=profile.php?profile="' . get_username_from_user_id($pdo, $comment["user_id"]) . '>' .
                    get_username_from_user_id($pdo, $comment["user_id"]) . 
                '</a>';
                if($comment["user_id"] === $_SESSION["user_id"] || $user_id === $_SESSION["user_id"]){
                    echo "<a class='newsfeed_link' href=includes/delete_comment.php?comment=" . $comment["id"] . ">
                    Delete</a>";        
                }
            echo'
            </h4>
            <h5>'
                . $comment["uploaded_at"] .
            '</h5><br><br><br><br><br>';
            echo '<p>' .
                $comment["comment"] . 
            '</p><br>
        </article>';
}