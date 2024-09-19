<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    require_once 'config_session.php';
	$user_id = $_SESSION["user_id"];
	$comment = $_POST["comment"];

		try{
		
			require_once 'dbh.php';
			require_once 'comment_model.php';
			require_once 'comment_controller.php';
			require_once 'config_session.php';
			
            if(isset($_GET["image"])){
                create_comment($pdo, $user_id, $_GET["image"], $comment, "image");
                header("location:" . $_SESSION["return_url"]);
            }
            if(isset($_GET["note"])){
                create_comment($pdo, $user_id, $_GET["note"], $comment, "note");
                header("location:" . $_SESSION["return_url"]);
            }
            if(isset($_GET["plant"])){
                create_comment($pdo, $user_id, $_GET["plant"], $comment, "plant");
                header("location:" . $_SESSION["return_url"]);
            }

			$pdo = null;
			$stmt = null;
			
			die();
		} catch(PDOException $e) {
			die("Query failed: " . $e->getMessage());
		}
} else {
	die();
}	