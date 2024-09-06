<?php

declare(strict_types=1);

require_once 'image_manage_model.php';

function delete_image(object $pdo, string $id){
    remove_image_database_entry($pdo, $id);
    remove_image_file($id);
}