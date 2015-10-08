<?php
@include("../functions/functions.php");
@include("../config/config.php");
session_set_cookie_params(0, SITE_ROOT);
session_start();

try {
   $STH = $DBH->prepare("INSERT INTO 0mrb_uutiset (otsikko, teksti, pvm) VALUES (:otsikko, :teksti, :pvm)");
   $STH->bindParam(':otsikko', $_POST['otsikko']);
   $STH->bindParam(':teksti', $_POST['teksti']);
   $STH->bindParam(':pvm', date('y-m-d H:m:s'));
   $STH->execute();

} catch(PDOException $e) {
    file_put_contents('../log/DBErrors.txt', 'mnewsArticleAddComment.php: ' . $e->getMessage() . "\n", FILE_APPEND);
}

redirect(SITE_ROOT . "uutiset");
?>
