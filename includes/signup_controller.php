<?php

declare(strict_types=1);

function is_input_empty(string $username,string $password,string $email): bool {
	if (empty($username) || empty($password) || empty($email)) {
		return true;
	}
	else{
		return false;
	}
}

function is_email_invalid(string $email): bool {
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		return FALSE;
	}
	else{
		return false;
	}
}
function is_username_taken(object $pdo, string $username): bool {
	if(get_username($pdo, $username) ){
		return true;
	}
	else{
		return false;
	}
}

function is_email_taken(object $pdo, string $email): bool {
	if(get_email($pdo, $email) ){
		return true;
	}
	else{
		return false;
	}
}

function create_user(object $pdo, string $password, string $username, string $email): void
{
	set_user($pdo, $password, $username, $email);
}
