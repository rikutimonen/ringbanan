<?php
@include("../functions/functions.php");
@include("../config/config.php");
session_set_cookie_params(0, SITE_ROOT);
session_start();

try {
	$STH = $DBH->prepare("UPDATE 0mrb_tuotteet SET tNimi=:tNimi, tKuvaus=:tKuvaus, tHinta=:tHinta  WHERE tID=:tID");
	$STH->bindParam(':tID', $_GET['tID']);
   $STH->bindParam(':tNimi', $_POST['tNimi']);
   $STH->bindParam(':tKuvaus', $_POST['tKuvaus']);
   $STH->bindParam(':tHinta', $_POST['tHinta']);
	$STH->execute();
} catch(PDOException $e) {
	// file_put_contents('log/DBErrors.txt', 'product.php: ' . $e->getMessage() . "\n", FILE_APPEND);
}

redirect(SITE_ROOT . "merchandise");
?>
