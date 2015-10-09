<?php
@include("config/config.php");
session_set_cookie_params(0, SITE_ROOT);
session_start();

try {
	$uutiskommentit = array();
	$STH = $DBH->prepare("SELECT USER.username 'username', UK.otsikko 'otsikko', UK.teksti 'teksti', UK.pvm 'pvm', UK.k_uutisID 'k_uutisID', UK.kommenttiID 'kommenttiid'
                        FROM 0mrb_uutiset U
                        LEFT JOIN 0mrb_uutiskommentit UK ON UK.k_uutisID = U.uutisID
                        LEFT JOIN 0mrb_users USER ON UK.k_userID = USER.userID
                        WHERE k_uutisID=:k_uutisID
                  		ORDER BY pvm;");
	$STH->bindParam(':k_uutisID', $_GET['uutisid']);
	$STH->execute();
	$STH->setFetchMode(PDO::FETCH_OBJ);
	while($uutiskommentti = $STH->fetch()) {
		$uutiskommentit[] = $uutiskommentti;
	}
} catch(PDOException $e) {
	file_put_contents('log/DBErrors.txt', 'products_index.php: ' . $e->getMessage() . "\n", FILE_APPEND);
}
?>
