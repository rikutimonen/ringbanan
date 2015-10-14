<?php
@include("../functions/functions.php");
@include("../config/config.php");
session_set_cookie_params(0, SITE_ROOT);
session_start();


try {
	$STH = $DBH->prepare("DELETE FROM 0mrb_kuvat WHERE kuvaID = :kuvaID;");
	$STH->bindParam(':kuvaID', $_GET['kuvaid']);
	if($STH->execute()){
		$_SESSION['viesti'] = 'Kuva ID ' . $_SESSION['kuvaid'] . ' poistettu';
	}
} catch(PDOException $e) {
	// file_put_contents('log/DBErrors.txt', 'deleteCategory.php: '.$e->getMessage()."\n", FILE_APPEND);
	$_SESSION['viesti'] = 'Kuvan poistamisessa ongelma.';
}

redirect(SITE_ROOT . "mediat");
?>
