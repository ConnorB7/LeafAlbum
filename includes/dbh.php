<?php

$host = 'vuxmysql11';
$dbname = 'leafalbum';
$dbusername = 'c';
$dbpassword = 'Wve123!!';

try {
	$pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	die("Connection has failed: " . $e->getMessage());
}
