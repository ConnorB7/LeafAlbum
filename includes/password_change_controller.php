<?php

declare(strict_types=1);

function passwords_dont_match(string $new_password_1, string $new_password_2){
    if(strcmp($new_password_1, $new_password_2)){
        return true;
    }
    else{
        return false;
    }
}

function password_too_short(string $new_password_1){
    if(strlen($new_password_1) < 6){
        return true;
    }
    else{
        return false;
    }
}

function password_not_capital_lowercase($new_password_1){
    if(preg_match('`[A-Z]`', $new_password_1) && preg_match('`[a-z]`',$new_password_1)){
        return false;
    }
    else{
        return true;
    }
}

function password_no_numbers($new_password_1){
    if(preg_match('`[0-9]`',$new_password_1)){
        return false;
    }
    else{
        return true;
    }
}

function change_password(object $pdo, string $password){
    set_password($pdo, $password);
}

function incorrect_current_password(string $hashedpassword, string $password){
    if(!password_verify($password, $hashedpassword)){
        return true;
    }
    else{
        return false;
    }
}