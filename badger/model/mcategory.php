<?php

$data = array('category' => $_GET['kat']);

try {
	$STH = $DBH->prepare("SELECT * FROM vk_kategoriat WHERE nav_nimi = :category");
	$STH->execute($data);
	$STH->setFetchMode(PDO::FETCH_OBJ);
	$category = $STH->fetch();
} catch(PDOException $e) {
	file_put_contents('log/DBErrors.txt', 'category.php: '.$e->getMessage()."\n", FILE_APPEND);
}

?>