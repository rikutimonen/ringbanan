<?php
@include_once ('../config/config.php');
session_set_cookie_params ( 0, SITE_ROOT );
session_start ();

if (!empty ( $_GET ['tID'] )) {
	//echo ("tID= " . $_GET ['tID']);
	if (isset ( $_SESSION ['cart'] )) { // Onko vanhaa koria olemassa?
	                                  // 'vanha' kori muutetaan taulukoksi
		$cartArray = unserialize ( $_SESSION ['cart'] );
		// taulun loppuun lisätään uusi tuote id
		$cartArray [] = $_GET ['tID'];
		// 'uusi' kori tallennetaan tekstimuotoon
		$_SESSION ['cart'] = serialize ( $cartArray );
	} else { // Koriin ensimmäinen tuote
		$cartArray [] = $_GET ['tID'];
		$_SESSION ['cart'] = serialize ( $cartArray );
	}
} else { //Jos ei uutta tID:tä, muutetaan sarjallistettu kori taulukoksi
	if (isset ( $_SESSION ['cart'] )) {
		$cartArray = unserialize ( $_SESSION ['cart'] );
	}
}
//Palauta korissa olevien tuotteiden lkm
if (isset($cartArray)){
	echo count($cartArray);
} else {
	echo 0;
}

// testejä
//var_dump($cartArray);
//echo $_SESSION['cart'];

?>