<?php
@include("../functions/functions.php");
@include("../config/config.php");
session_set_cookie_params(0, SITE_ROOT);
session_start();


try {
	$STH = $DBH->prepare("DELETE FROM 0mrb_uutiskommentit WHERE kommenttiID = :kommenttiid");
	$STH->bindParam(':kommenttiid', $_GET['kommenttiid']);
	if($STH->execute()){
		$_SESSION['viesti'] = 'Kommentti ID ' . $_SESSION['kommenttiid'] . ' poistettu';
	}
} catch(PDOException $e) {
	// file_put_contents('log/DBErrors.txt', 'deleteCategory.php: '.$e->getMessage()."\n", FILE_APPEND);
	$_SESSION['viesti'] = 'Kommentin poistamisessa ongelma.';
}

redirect(SITE_ROOT . "uutiset/" . $_SESSION['uutisid']);
?>
