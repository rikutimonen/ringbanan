<?php
include_once('config/config.php');
session_set_cookie_params (0, SITE_ROOT);
session_start();
include_once('functions/functions.php');
// kirjautumisen tarkistus
//if ($_SESSION['taso'] != 2)
	//redirect(SITE_ROOT);

try {
	$SQL = "SELECT * FROM 0mrb_kategoriat WHERE kID > 0;";
	$STH = $DBH->query($SQL);
	$STH->setFetchMode(PDO::FETCH_OBJ);
	while($category = $STH->fetch()){
		echo '<option value="'.$category->kID.'">'.$category->kNimi.'</option>';
	}
} catch(PDOException $e) {
	file_put_contents('log/DBErrors.txt', 'getCategories.php: '.$e->getMessage()."\n", FILE_APPEND);
}
?>