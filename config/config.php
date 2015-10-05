<?php
//define('SITE_ROOT', '');

$user = 'joonaoko';
$pass = 'Kumiankka';
$dbname = 'joonaoko';
$host = 'mysql.metropolia.fi';

try{
	$DBH = new PDO("mysql:host=$host; dbname=$dbname",  $user, $pass);
	$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$DBH->exec("SET NAMES utf8;");
}catch(PDOException $e){
	echo("<p>DB avaus epäonnistui</p>");
	file_put_contents("log/DBErrors.txt", "DB connection error: " . $e->getMessage()."\n", FILE_APPEND);
}
?>
