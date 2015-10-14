<?php
//saman alakategorian tuotteita max 5 kpl, akakategoria $_GET[] parametrina
try {
	$products = array();
	$STH = $DBH->prepare("SELECT vk_tuotteet.nimi, vk_tuotteet.hinta, vk_tuotteet.kuvaus, vk_tuotteet.tID, vk_kategoriat.nav_nimi as akNimi, vk_kategoriat.parent_cat_id FROM vk_tuotteet
						 JOIN vk_kategorialiitos ON vk_tuotteet.tID = vk_kategorialiitos.tuote_id
						 JOIN vk_kategoriat ON vk_kategorialiitos.kategoria_id = vk_kategoriat.kID
						 WHERE vk_kategoriat.nav_nimi=:alakategoria
						 ORDER BY vk_tuotteet.pvm DESC;");
	$STH->bindParam(':alakategoria', $_GET['alakat']); //Haun muuttuva tieto
	$STH->execute();
	$STH->setFetchMode(PDO::FETCH_OBJ);
	while($product = $STH->fetch()){
		$STH2 = $DBH->query("SELECT vk_kategoriat.nav_nimi FROM vk_kategoriat
						 WHERE kID = ".$product->parent_cat_id);
		$STH2->setFetchMode(PDO::FETCH_OBJ);
		$category = $STH2->fetch();
		$product->kNimi = $category->nav_nimi;
		$products[] = $product;
	}
} catch(PDOException $e) {
	file_put_contents('log/DBErrors.txt', 'products.php: '.$e->getMessage()."\n", FILE_APPEND);
}

?>