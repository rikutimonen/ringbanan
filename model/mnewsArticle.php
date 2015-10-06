<?php
@include("config/config.php");
session_set_cookie_params(0, SITE_ROOT);
session_start();

try {
	$STH = $DBH->prepare("SELECT * FROM 0mrb_uutiset WHERE uutisID=:uutisID");
	$STH->bindParam(':uutisID', $_GET['uutisid']);
	$STH->execute();
	$STH->setFetchMode(PDO::FETCH_OBJ);

	$uutinen = $STH->fetch();

	//print_r($uutinen);
} catch(PDOException $e) {
	file_put_contents('log/DBErrors.txt', 'product.php: ' . $e->getMessage() . "\n", FILE_APPEND);
}
?>
