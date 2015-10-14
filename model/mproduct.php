<?php

try {

	$STH = $DBH->prepare(
		"SELECT * FROM 
		vk_tuotteet 
		WHERE 
		nimi=:tuote");
	
	$STH->bindParam(':tuote', str_replace('_', ' ', $_GET['tuote']));
	$STH->execute();
	$STH->setFetchMode(PDO::FETCH_OBJ);
	$product = $STH->fetch(); 
} 

catch(PDOException $e) {
	file_put_contents('log/DBErrors.txt', 'product.php: '.$e->getMessage()."\n", FILE_APPEND);
}

?>