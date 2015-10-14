<?php

try {
	$products = array();
										//haetaan tuotteista nimi, hinta, kuvaus, tuote-id, navinimi alakategorianimenä, ja kategoria id parent kategorialle
	$STH = $DBH -> query("SELECT 0mrb_tuotteet.tID,
						0mrb_tuotteet.tNimi,
						0mrb_tuotteet.tHinta,
						0mrb_tuotteet.tKuvaus,
						0mrb_kategoriat.kNimi,
						0mrb_tuotteet.katID

						FROM 0mrb_tuotteet,
						0mrb_kategoriat

						WHERE

						0mrb_tuotteet.katID = 0mrb_kategoriat.kID AND
						0mrb_kategoriat.kID = 3

						ORDER BY 0mrb_tuotteet.tID");

	$STH->setFetchMode(PDO::FETCH_OBJ);
										//haetaan katergoriat

	while($product = $STH->fetch()) {
		$STH2 = $DBH -> query("SELECT
				0mrb_kategoriat.kNimi

				FROM

				0mrb_kategoriat,
				0mrb_tuotteet

				WHERE 

				0mrb_kategoriat.kID = 0mrb_tuotteet.katID");

		$STH2->setFetchMode(PDO::FETCH_OBJ);
		$category = $STH2->fetch();

		$product->kNimi = $category->navNimi;
		$products[] = $product;

	}
}

catch(PDOException $e) {
	file_put_contents('log/DBErrors.txt', 'products.php: '.$e->getMessage()."\n", FILE_APPEND);
}

?>