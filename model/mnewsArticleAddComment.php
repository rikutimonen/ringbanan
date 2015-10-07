<?php
@include("config/config.php");
session_set_cookie_params(0, SITE_ROOT);
session_start();

try {
   $STH = $DBH->prepare("INSERT INTO 0mrb_uutiskommentit (k_uutisID, otsikko, teksti) VALUES (:k_uutisID, :otsikko, :teksti)");
   $STH->bindParam(':uutisID', $_POST['k_uutisID']);
   $STH->bindParam(':otsikko', $_POST['otsikko']);
   $STH->bindParam(':teksti', $_POST['teksti']);
   $STH->execute();

} catch(PDOException $e) {
   // file_put_contents('../log/DBErrors.txt', 'mnewsArticleAddComment.php: ' . $e->getMessage() . "\n", FILE_APPEND);
}

echo($_POST['k_uutisID']);
echo($_POST['otsikko']);
echo($_POST['teksti']);

//redirect(SITE_ROOT . uutiset)
?>
