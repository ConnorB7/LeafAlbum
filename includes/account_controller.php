<?php

function user_logged_in(): bool 
{
    if(isset($_SESSION["user_id"])){
        return true;
    }
    else{
        return false;
    }
}

function retrieve_username(): string
{
    if(isset($_SESSION["user_id"])){
        return $_SESSION["user_username"];
    }
    else{
        return "unknownUser";
    }
}