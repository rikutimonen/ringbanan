<?php
@include("config/config.php");
session_set_cookie_params(0, SITE_ROOT);
session_start();

try {
   $STH = $DBH->prepare("SELECT * FROM 0mrb_uutiset ORDER BY pvm DESC LIMIT 10");
	$STH->execute();
	$STH->setFetchMode(PDO::FETCH_OBJ);
	while($uutinen = $STH->fetch()) {
	   $uutiset[] = $uutinen;
	}
	// print_r($uutiset);
} catch(PDOException $e) {
	file_put_contents('log/DBErrors.txt', 'product.php: ' . $e->getMessage() . "\n", FILE_APPEND);
}
?>
