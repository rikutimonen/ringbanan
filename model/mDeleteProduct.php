<?php
@include("../functions/functions.php");
@include("../config/config.php");
session_set_cookie_params(0, SITE_ROOT);
session_start();


try {
	$STH = $DBH->prepare("DELETE FROM 0mrb_tuotteet WHERE tID = :tID;");
	$STH->bindParam(':tID', $_GET['tID']);
	if($STH->execute()){
		$_SESSION['viesti'] = 'Tuote ID ' . $_SESSION['tID'] . ' poistettu';
	}
} catch(PDOException $e) {
	// file_put_contents('log/DBErrors.txt', 'deleteCategory.php: '.$e->getMessage()."\n", FILE_APPEND);
	$_SESSION['viesti'] = 'Tuotteen poistamisessa ongelma.';
}

redirect(SITE_ROOT . "merchandise");
?>
