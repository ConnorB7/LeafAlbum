<?php

class image {
    public $id;
    public $user_id;
    public $username;
    public $title;
    public $plant_id;
    public $uploaded_at;
    public $user_date;
    public $like_quantity;
    public $comment_quantity;
    private $data;

    function __construct(object $pdo, string $id) {
        $this->id = $id;
        $data = get_image_data($pdo, $id);
        $this->user_id = $data["user_id"];
        $this->username = $data["username"];
        $this->title = $data["title"];
        $this->plant_id = $data["plant_id"];
        $this->uploaded_at = $data["uploaded_at"];
        $this->user_date = $data["user_date"];
        $this->like_quantity = $data["like_quantity"];
        $this->comment_quantity = $data["comment_quantity"];
    }
    function get_id() {
        return $this->id;
    }
    function get_user_id() {
        return $this->user_id;
    }
    function get_username() {
        return $this->username;
    }
    function get_title() {
        return $this->title;
    }
    function get_plant_id() {
        return $this->plant_id;
    }
    function get_uploaded_at() {
        return $this->uploaded_at;
    }
    function get_user_date() {
        return $this->user_date;
    }
    function get_like_quantity() {
        return $this->like_quantity;
    }
    function get_comment_quantity() {
        return $this->comment_quantity;
    }
}

class note {
    public $id;
    public $user_id;
    public $username;
    public $title;
    public $plant_id;
    public $uploaded_at;
    public $user_date;
    public $note;
    public $like_quantity;
    public $comment_quantity;
    private $data;

    function __construct(object $pdo, string $id) {
        $this->id = $id;
        $data = get_note_data($pdo, $id);
        $this->id = $data["note_id"];
        $this->user_id = $data["user_id"];
        $this->username = $data["username"];
        $this->title = $data["title"];
        $this->plant_id = $data["plant_id"];
        $this->uploaded_at = $data["uploaded_at"];
        $this->user_date = $data["user_date"];
        $this->note = $data["note"];
        $this->like_quantity = $data["like_quantity"];
        $this->comment_quantity = $data["comment_quantity"];
    }
    function get_id() {
        return $this->id;
    }
    function get_user_id() {
        return $this->user_id;
    }
    function get_username() {
        return $this->username;
    }
    function get_title() {
        return $this->title;
    }
    function get_plant_id() {
        return $this->plant_id;
    }
    function get_uploaded_at() {
        return $this->uploaded_at;
    }
    function get_user_date() {
        return $this->user_date;
    }
    function get_note() {
        return $this->note;
    }
    function get_like_quantity() {
        return $this->like_quantity;
    }
    function get_comment_quantity() {
        return $this->comment_quantity;
    }
}

class plant {
    public $id;
    public $user_id;
    public $username;
    public $title;
    public $plant_type;
    public $uploaded_at;
    public $plant_date;
    public $harvest_date;
    public $like_quantity;
    public $comment_quantity;
    public $plant_description;
    private $data;

    function __construct(object $pdo, string $id) {
        $this->id = $id;
        $data = get_plant_data($pdo, $id);
        $this->user_id = $data["user_id"];
        $this->username = $data["username"];
        $this->title = $data["title"];
        $this->plant_type = $data["plant_type"];
        $this->uploaded_at = $data["uploaded_at"];
        $this->plant_date = $data["plant_date"];
        $this->harvest_date = $data["harvest_date"];
        $this->like_quantity = $data["like_quantity"];
        $this->comment_quantity = $data["comment_quantity"];
        $this->plant_description = $data["plant_description"];       
    }
    function get_id() {
        return $this->id;
    }
    function get_user_id() {
        return $this->user_id;
    }
    function get_username() {
        return $this->username;
    }
    function get_title() {
        return $this->title;
    }
    function get_plant_type() {
        return $this->plant_type;
    }
    function get_uploaded_at() {
        return $this->uploaded_at;
    }
    function get_plant_date() {
        return $this->plant_date;
    }
    function get_harvest_date() {
        return $this->harvest_date;
    }
    function get_like_quantity() {
        return $this->like_quantity;
    }
    function get_comment_quantity() {
        return $this->comment_quantity;
    }
}

function image_post_edit(object $pdo, object $image_object){
    $_SESSION["return_url"] = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    echo "
    <h4>
        <a class='newsfeed_link' href=profile.php?profile=" . $image_object->get_username() . ">" . 
        $image_object->get_username() . 
        "</a>
    </h4>
    <h5>" . 
        $image_object->get_uploaded_at() . "
    </h5>
    <h4>
        <a class='newsfeed_link' href=post_page.php?image=" . $image_object->get_id() . ">" .
        $image_object->get_title() . 
        "</a>
    </h4>
    <h5>
        Image
    </h5>
    <p>
        <br><br>
        <a href=post_page.php?image=" . $image_object->get_id() . ">
        <img src='includes/uploads/". $image_object->get_id() . "' 
        alt='" . htmlspecialchars($image_object->get_title()) . "' width=65%>
        </a>
    </p>
    <br>
    <h6>
    <a class='newsfeed_link' href=https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]&edit_caption=true>
    Edit caption</a>
    </h6>
    <h3>
    <a class='newsfeed_link' href=includes/delete_post.php?image=". $_GET['image'] .">
    Delete image</a>
    </h3>
    <br><br><br><br>";
}

function note_post_edit(object $pdo, object $note_object){
    $_SESSION["return_url"] = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    echo "
    <h4>
        <a class='newsfeed_link' href=profile.php?profile=" . $note_object->get_username() . ">" . 
        $note_object->get_username() . 
        "</a>
    </h4>
    <h5>" . 
        $note_object->get_uploaded_at() . "
    </h5>
    <h4>
        <a class='newsfeed_link' href=post_page.php?note=" . $note_object->get_id() . ">" .
        $note_object->get_title() . 
        "</a>
    </h4>
    <h5>
        Note
    </h5>
    <p>
        <br><br>
        <a href=post_page.php?note=" . $note_object->get_id() . ">" .
        $note_object->get_note() . "
        </a>
    </p>
    <br>
    <h6>
    <a class='newsfeed_link' href=https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]&edit_caption=true>
    Edit caption</a>
    </h6>
    <br><br><br>
    <h6>
    <a class='newsfeed_link' href=https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]&edit_note=true>
    Edit note</a>
    </h6>
    <h3>
    <a class='newsfeed_link' href=includes/delete_post.php?note=". $_GET['note'] .">
    Delete note</a>
    </h3>
    <br><br><br>";
}

function plant_post_edit(object $pdo, object $plant_object){
    $_SESSION["return_url"] = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    echo "
    <h4>
        <a class='newsfeed_link' href=profile.php?profile=" . $plant_object->get_username() . ">" . 
        $plant_object->get_username() . 
        "</a>
    </h4>
    <h5>" . 
        $plant_object->get_uploaded_at() . "
    </h5>
    <h4>
        <a class='newsfeed_link' href=post_page.php?plant=" . $plant_object->get_id() . ">" .
        $plant_object->get_title() . 
        "</a>
    </h4>
    <h5>
        Plant
    </h5>
    <p>
        <br><br>Plant Date: " . $plant_object->get_plant_date() . "<br>Harvest Date: " . $plant_object->get_harvest_date() . "
    </p>
    <br>
    <h6>
    <a class='newsfeed_link' href=https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]&edit_caption=true>
    Edit caption</a>
    </h6>
    <h3>
    <a class='newsfeed_link' href=includes/delete_post.php?plant=". $_GET['plant'] .">
    Delete plant</a>
    </h3>
    <br><br><br>";
}

function image_post(object $pdo, object $image_object){
    $_SESSION["return_url"] = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    echo "
    <h4>
        <a class='newsfeed_link' href=profile.php?profile=" . $image_object->get_username() . ">" . 
        $image_object->get_username() . 
        "</a>";
        if($image_object->get_username() === $_SESSION["user_username"]){
            echo "<a class='newsfeed_link' href=edit_post_page.php?image=" . $image_object->get_id() . ">
            Edit Image
            </a>";
        }
    echo "
    </h4>
    <h5>" . 
        $image_object->get_uploaded_at() . "
    </h5>
    <h4>
        <a class='newsfeed_link' href=post_page.php?image=" . $image_object->get_id() . ">" .
        $image_object->get_title() . 
        "</a>
    </h4>
    <h5>Image
    </h5>
    <p>
        <br><br>
        <a href=post_page.php?image=" . $image_object->get_id() . ">
        <img src='includes/uploads/". $image_object->get_id() . "' 
        alt='" . htmlspecialchars($image_object->get_title()) . "' width=50%>
        </a>
    </p>
    <br>
    <h6>";
    if(is_liked_by_user($pdo, $_SESSION["user_id"], $image_object->get_id(), 'image')){
        echo "<a class='newsfeed_link' href=includes/like.php?user_id=" . $_SESSION["user_id"] . "&post_id=" . $image_object->get_id() . "&type=image>
        Unlike</a> ";
    }
    else{
        echo "<a class='newsfeed_link' href=includes/like.php?user_id=" . $_SESSION["user_id"] . "&post_id=" . $image_object->get_id() . "&type=image>
        Like</a> ";
    };
    echo $image_object->get_like_quantity() . 
    "</h6>
    <h3>" . 
        $image_object->get_comment_quantity() . 
        " <a class='newsfeed_link' href=post_page.php?image=" . $image_object->get_id() . ">
        Comments
        </a>
    </h3>
    <br><br><br>";
}

function image_single_post(object $pdo, object $image_object){
    $_SESSION["return_url"] = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    echo "
    <h4>
        <a class='newsfeed_link' href=profile.php?profile=" . $image_object->get_username() . ">" . 
        $image_object->get_username() . 
        "</a>";
        if($image_object->get_username() === $_SESSION["user_username"]){
            echo "<a class='newsfeed_link' href=edit_post_page.php?image=" . $image_object->get_id() . ">
            Edit Image
            </a>";
        }
    echo "
    </h4>
    <h5>" . 
        $image_object->get_uploaded_at() . "
    </h5>
    <h4>
        <a class='newsfeed_link' href=post_page.php?image=" . $image_object->get_id() . ">" .
        $image_object->get_title() . 
        "</a>
    </h4>
    <h5>Image
    </h5>
    <p>
        <br><br>
        <a href=post_page.php?image=" . $image_object->get_id() . ">
        <img src='includes/uploads/". $image_object->get_id() . "' 
        alt='" . htmlspecialchars($image_object->get_title()) . "' width=95%>
        </a>
    </p>
    <br>
    <h6>";
    if(is_liked_by_user($pdo, $_SESSION["user_id"], $image_object->get_id(), 'image')){
        echo "<a class='newsfeed_link' href=includes/like.php?user_id=" . $_SESSION["user_id"] . "&post_id=" . $image_object->get_id() . "&type=image>
        Unlike</a> ";
    }
    else{
        echo "<a class='newsfeed_link' href=includes/like.php?user_id=" . $_SESSION["user_id"] . "&post_id=" . $image_object->get_id() . "&type=image>
        Like</a> ";
    };
    echo $image_object->get_like_quantity() . 
    "</h6>
    <h3>" . 
        $image_object->get_comment_quantity() . 
        " <a class='newsfeed_link' href=post_page.php?image=" . $image_object->get_id() . ">
        Comments
        </a>
    </h3>
    <br><br><br>";
}

function note_post(object $pdo, object $note_object){
    $_SESSION["return_url"] = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    echo "
    <h4>
        <a class='newsfeed_link' href=profile.php?profile=" . $note_object->get_username() . ">" . 
        $note_object->get_username() . 
        "</a>";
        if($note_object->get_username() === $_SESSION["user_username"]){
            echo "<a class='newsfeed_link' href=edit_post_page.php?note=" . $note_object->get_id() . ">
            Edit note
            </a>";
        }
    echo "
    </h4>
    <h5>" . 
        $note_object->get_uploaded_at() . "
    </h5>
    <h4>
        <a class='newsfeed_link' href=post_page.php?note=" . $note_object->get_id() . ">" .
        $note_object->get_title() . 
        "</a>
    </h4>
    <h5>Note
    </h5>
    <p>
        <br><br>
        <a href=post_page.php?note=" . $note_object->get_id() . ">" .
        $note_object->get_note() . "
        </a>
    </p>
    <br>
    <h6>";
    if(is_liked_by_user($pdo, $_SESSION["user_id"], $note_object->get_id(), 'note')){
        echo "<a class='newsfeed_link' href=includes/like.php?&user_id=" . $_SESSION["user_id"] . "&post_id=" . $note_object->get_id() . "&type=note>
        Unlike</a> ";
    }
    else{
        echo "<a class='newsfeed_link' href=includes/like.php?user_id=" . $_SESSION["user_id"] . "&post_id=" . $note_object->get_id() . "&type=note>
        Like</a> ";
    };
    echo $note_object->get_like_quantity() . 
    "</h6>
    <h3>" . 
        $note_object->get_comment_quantity() . 
        " <a class='newsfeed_link' class='newsfeed_link' href=post_page.php?note=" . $note_object->get_id() . ">
        Comments
        </a>
    </h3>
    <br><br><br>";
}

function plant_post(object $pdo, object $plant_object){
    $_SESSION["return_url"] = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    echo "
    <h4>
        <a class='newsfeed_link' href=profile.php?profile=" . $plant_object->get_username() . ">" . 
        $plant_object->get_username() . 
        "</a>";
        if($plant_object->get_username() === $_SESSION["user_username"]){
            echo "<a class='newsfeed_link' href=edit_post_page.php?plant=" . $plant_object->get_id() . ">
            Edit plant
            </a>";
        }
    echo "
    </h4>
    <h5>" . 
        $plant_object->get_uploaded_at() . "
    </h5>
    <h4>
        <a class='newsfeed_link' href=post_page.php?plant=" . $plant_object->get_id() . ">" .
        $plant_object->get_title() . 
        "</a>
    </h4>
    <h5>
        Plant
    </h5>
    <p>
        <br><br>Plant Date: " . $plant_object->get_plant_date() . "<br>Harvest Date: " . $plant_object->get_harvest_date() . "
    </p>
    <br>
    <h6>";
    if(is_liked_by_user($pdo, $_SESSION["user_id"], $plant_object->get_id(), 'plant')){
        echo "<a class='newsfeed_link' href=includes/like.php?user_id=" . $_SESSION["user_id"] . "&post_id=" . $plant_object->get_id() . "&type=plant>
        Unlike</a> ";
    }
    else{
        echo "<a class='newsfeed_link' href=includes/like.php?user_id=" . $_SESSION["user_id"] . "&post_id=" . $plant_object->get_id() . "&type=plant>
        Like</a> ";
    };
    echo $plant_object->get_like_quantity() . 
    "</h6>
    <h3>" . 
        $plant_object->get_comment_quantity() . 
        " <a class='newsfeed_link' class='newsfeed_link' href=post_page.php?plant=" . $plant_object->get_id() . ">
        Comments
        </a>
    </h3>
    <br><br><br>";
}

function get_following_newsfeed(object $pdo, int $user_id){
	$followings_posts = get_following_posts($pdo, get_following_list($pdo, $user_id));
    echo '<img src="../images/newsfeed.png"><article class="all-articles">';
    foreach($followings_posts as $post){    
        echo '<br><article class="main-container">';
        if(isset($post["image_id"])){
            $image = new image($pdo, $post["image_id"]);
            image_post($pdo, $image);
        }
        if(isset($post["note_id"])){
            $note = new note($pdo, $post["note_id"]);
            note_post($pdo, $note);            
        }
        if(isset($post["plant_id"])){
            $plant = new plant($pdo, $post["plant_id"]);
            plant_post($pdo, $plant);            
        }
        echo '</article>';
    }
    echo '<br></article>';
}

function display_profile_image(object $pdo, int $user_id){
    if(isset($_GET["profile"])){
		$image_id = get_profile_image_id($pdo, get_user_id($pdo, $_GET["profile"]));
        if($image_id){
            $image_object = new image($pdo, $image_id);        
            echo "<a href=post_page.php?image=" . $image_object->get_id() . ">
            <img src='includes/uploads/". $image_object->get_id() . "' 
            alt='" . htmlspecialchars($image_object->get_title()) . "' width=15%>
            </a><br>";   
        }    
    }
    else{
		$image_id = get_profile_image_id($pdo, $_SESSION["user_id"]);;    
        if($image_id){
            $image_object = new image($pdo, $image_id);
            echo "<a href=post_page.php?image=" . $image_object->get_id() . ">
            <img src='includes/uploads/". $image_object->get_id() . "' 
            alt='" . htmlspecialchars($image_object->get_title()) . "' width=65%>
            </a>";    
        } 
    }
}

function get_newsfeed(object $pdo, int $user_id){
    if(isset($_GET["profile"])){
		$following[] = get_user_id($pdo, $_GET["profile"]);
    }
    else{
		$following = get_following_list($pdo, $user_id);
    }
	$followings_posts = get_following_posts($pdo, $following);
    echo '<img src="../images/newsfeed.png"><article class="all-articles">';
    foreach($followings_posts as $post){    
        echo '<br><article class="main-container">';
        if(isset($post["image_id"])){
            $image = new image($pdo, $post["image_id"]);
            image_post($pdo, $image);
        }
        if(isset($post["note_id"])){
            $note = new note($pdo, $post["note_id"]);
            note_post($pdo, $note);            
        }
        if(isset($post["plant_id"])){
            $plant = new plant($pdo, $post["plant_id"]);
            plant_post($pdo, $plant);            
        }
        echo '</article>';
    }
    echo '</article>';
}

function get_images(object $pdo, int $user_id){
	$following[] = $user_id;
	$followings_posts = get_following_posts($pdo, $following);
    echo '<br><br><br><br><br><br>
    <article class="all-articles">
        <br>
        <h1 class="dark-green">' . get_username_from_user_id($pdo, $user_id ).'\'s
        <br>
        Images</h1>';
        foreach($followings_posts as $post_data){
            if(isset($post_data["image_id"])){
                echo '<br><article class="main-container">';
                $image = new image($pdo, $post_data["image_id"]);
                image_post($pdo, $image);
                echo "</article class = 'main-container'>";
            }
    }
    echo "</article class='all-articles'>";
}

function get_image(object $pdo, String $image_id){
    $image_info = get_image_data($pdo, $image_id);
    echo "
    <br><br>
    <article class='all-articles'>
        <br>
        <article class='main-container'>";
                $image = new image($pdo, $image_id);
                image_post($pdo, $image);
        echo "</article class = 'main-container'>
        <br>
    </article class='all-articles'>";
}

function get_single_image(object $pdo, String $image_id){
    $image_info = get_image_data($pdo, $image_id);
    echo "
    <br><br>
    <article class='all-articles'>
        <br>
        <article class='main-container'>";
                $image = new image($pdo, $image_id);
                image_single_post($pdo, $image);
        echo "</article class = 'main-container'>
        <br>
    </article class='all-articles'>";
}

function get_image_edit(object $pdo, String $image_id){
    $image_info = get_image_data($pdo, $image_id);
    echo "
    <br><br>
    <article class='all-articles'>
        <br>
        <article class='main-container'>";
                $image = new image($pdo, $image_id);
                image_post_edit($pdo, $image);
        echo "</article class = 'main-container'>
        <br>";
        if(isset($_GET["edit_caption"])){
            display_post_edit_box($pdo, $image_id, "image");
        }
    echo "</article class='all-articles'>";
}

function get_image_from_id(object $pdo, String $user_id){
    $following[] = $user_id;
	$followings_posts = get_following_posts($pdo, $following);
    echo '<br><br><br><br
    <h4>Your Images</h4>
    <br><br>
    <article class="all-articles">';
        foreach($followings_posts as $post_data){
            if(isset($post_data["image_id"])){
                echo '<article class="main-container">';
                $post_data = get_image_data($pdo, $post_data["image_id"]);
                echo "<h5>Image</h5><a href=profile.php?profile=" . htmlspecialchars($post_data["username"]) . "><h4>" . 
                htmlspecialchars($post_data["username"]) . 
                "</h4></a><a href=post_page.php?image=" . $post_data["image_id"] . "><h4>" . 
                htmlspecialchars($post_data["title"]) . 
                "</h4></a><br>
                uploaded at: ". 
                $post_data["uploaded_at"] . 
                "<br><a href=post_page.php?image=" . $post_data["image_id"] . ">" . 
                '<img src="includes/uploads/'. 
                $post_data["image_id"] .
                '" alt="' . 
                htmlspecialchars($post_data["title"]) . '" 
                width=60% height=60%>
                <br></a>';
            }
        echo "</article class = 'main-container'>";
    }
    echo "</article class='all-articles'>";
}

function get_notes(object $pdo, int $user_id){
	$following[] = $user_id;
	$followings_posts = get_following_posts($pdo, $following);
    echo '<br><br><br><br><br><br>    
    <article class="all-articles">
        <br>
        <h1 class="dark-green">' . get_username_from_user_id($pdo, $user_id ).'\'s
            <br>
        Notes</h1>';
        foreach($followings_posts as $post_data){
            if(isset($post_data["note_id"])){
                echo '<article class="main-container">';
                $note = new note($pdo, $post_data["note_id"]);
                note_post($pdo, $note);
                echo "</article class = 'main-container'>";
            }
    }
    echo "</article class='all-articles'>";
}

function get_note(object $pdo, String $note_id){
    $note_info = get_note_data($pdo, $note_id);
    echo "
    <br><br>
    <article class='all-articles'>
    <br>
        <article class='main-container'>";
            $note = new note($pdo, $note_id);
            note_post($pdo, $note);
        echo "</article class = 'main-container'>
        <br
    </article class='all-articles'>";
}

function get_note_edit(object $pdo, String $note_id){
    $note_info = get_note_data($pdo, $note_id);
    echo "
    <br><br>
    <article class='all-articles'>
    <br>
        <article class='main-container'>";
            $note = new note($pdo, $note_id);
            note_post_edit($pdo, $note);
        echo "</article class = 'main-container'>        
        <br>";
        if(isset($_GET["edit_caption"])){
            display_post_edit_box($pdo, $note_id, "note");
        }
        if(isset($_GET["edit_note"])){
            display_note_edit_box($pdo, $note_id, "note");
        }
    echo "
    </article class='all-articles'>";
}

function get_plants(object $pdo, int $user_id){
	$following[] = $user_id;
	$followings_posts = get_following_posts($pdo, $following);
    echo '<br><br><br><br><br><br>    
    <article class="all-articles">
        <br>
        <h1 class="dark-green">' . get_username_from_user_id($pdo, $user_id ).'\'s
        <br>
        Plants</h1>';
        foreach($followings_posts as $post_data){
            if(isset($post_data["plant_id"])){
                echo '<article class="main-container">';
                $plant = new plant($pdo, $post_data["plant_id"]);
                plant_post($pdo, $plant);
                echo "</article class = 'main-container'>";
            }
    }
    echo "</article class='all-articles'>";
}

function get_plant(object $pdo, String $plant_id){
    $plant_info = get_plant_data($pdo, $plant_id);
    echo "
    <br><br>
    <article class='all-articles'>
    <br>
        <article class='main-container'>";
            $plant = new plant($pdo, $plant_id);
            plant_post($pdo, $plant);
        echo "</article class = 'main-container'>
        <br>
    </article class='all-articles'>";
}

function get_plant_edit(object $pdo, String $plant_id){
    $plant_info = get_plant_data($pdo, $plant_id);
    echo "
    <br><br>
    <article class='all-articles'>
    <br>
        <article class='main-container'>";
            $plant = new plant($pdo, $plant_id);
            plant_post_edit($pdo, $plant);
        echo "</article class = 'main-container'>        
        <br>";
        if(isset($_GET["edit_caption"])){
            display_post_edit_box($pdo, $plant_id, "plant");
        }
    echo "</article class='all-articles'>";
}

function display_images_for_profile_photo(object $pdo, int $user_id){
    $following[] = $user_id;
	$users_posts = get_following_posts($pdo, $following);
    foreach($users_posts as $post_data){
        if(isset($post_data["image_id"])){
            echo '<br><article class="main-container">';
            $image = new image($pdo, $post_data["image_id"]);
            display_image_for_profile_photo($pdo, $image);
            echo "<br><br></article class = 'main-container'>";
        }
    }
}

function display_image_for_profile_photo(object $pdo, object $image_object){
    echo"
    <p>
        <br><br>
        <a href=includes/set_profile_image.php?image=" . $image_object->get_id() . ">
        <img src='includes/uploads/". $image_object->get_id() . "' 
        alt='" . htmlspecialchars($image_object->get_title()) . "' width=65%>
        </a>
    </p>";
}

function display_post_edit_box(object $pdo, $post_id, string $post_type){
    $_SESSION["return_url"] = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if($post_type === "image"){
        echo '<article class="main-container">
        <h4>Edit the caption</h4> 
        <br>
        <form action="includes/edit_caption.php?image='. $post_id . '" method="POST" ENCTYPE="multipart/form-data">
            <label>
                <textarea name="caption" rows="4" cols="100" maxlength=2999></textarea>
            </label>
            <br>
            <button class="button" type="submit" name="submit">Submit caption</button>
        </form>
        <br>
        </article>
        <br>';
    }

    if($post_type === "note"){
        echo '<article class="main-container">
        <h4>Edit the caption</h4> 
        <br>
        <form action="includes/edit_caption.php?note='. $post_id . '" method="POST" ENCTYPE="multipart/form-data">
            <label>
                <textarea name="caption" rows="4" cols="100" maxlength=2999></textarea>
            </label>
            <br>
            <button class="button" type="submit" name="submit">Submit caption</button>
        </form>
        <br>
        </article>
        <br>';
    }

    if($post_type === "plant"){
        echo '<article class="main-container">
        <h4>Edit the caption</h4> 
        <br>
        <form action="includes/edit_caption.php?plant='. $post_id . '" method="POST" ENCTYPE="multipart/form-data">
            <label>
                <textarea name="caption" rows="4" cols="100" maxlength=2999></textarea>
            </label>
            <br>
            <button class="button" type="submit" name="submit">Submit caption</button>
        </form>
        <br>
        </article>
        <br>';
    }
}

function display_note_edit_box(object $pdo, int $post_id, string $post_type){
    if($post_type === "note"){
        echo '<article class="main-container">
        <h4>Edit the note contents</h4> 
        <br>
        <form action="includes/edit_note.php?note='. $post_id . '" method="POST" ENCTYPE="multipart/form-data">
            <label>
                <textarea name="note" rows="4" cols="100" maxlength=2999></textarea>
            </label>
            <br>
            <button class="button" type="submit" name="submit">Submit caption</button>
        </form>
        <br>
        </article>
        <br>';
    }
}
