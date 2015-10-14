<?php
@include("../functions/functions.php");
@include("../config/config.php");
session_set_cookie_params(0, SITE_ROOT);
session_start();


try {
	$STH = $DBH->prepare("DELETE FROM 0mrb_uutiset WHERE uutisID = :uutisID; DELETE FROM 0mrb_uutiskommentit WHERE k_uutisid=:uutisID;");
	$STH->bindParam(':uutisID', $_GET['uutisid']);
	if($STH->execute()){
		$_SESSION['viesti'] = 'Uutinen ID ' . $_SESSION['kommenttiid'] . ' poistettu';
	}
} catch(PDOException $e) {
	// file_put_contents('log/DBErrors.txt', 'deleteCategory.php: '.$e->getMessage()."\n", FILE_APPEND);
	$_SESSION['viesti'] = 'Uutisen poistamisessa ongelma.';
}

redirect(SITE_ROOT . "uutiset");
?>
