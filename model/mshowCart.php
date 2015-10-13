<?php
@include_once('../config/config.php');
session_set_cookie_params (0, SITE_ROOT); 
session_start();
echo '<form id="sCart" method="post">';
//Haetaan tietokannasta sessiossa muistissa olevien id:t mukaiset tuotetiedot
if(isset($_SESSION['cart'])){
	$cartArray = unserialize($_SESSION['cart']);  //tekstimuodosta taulukoksi
	//asort($cartArray);
	//Tulostetaan tuotteet lomakkeelle, johon voi muuttaa tuotteiden lkm

	$yht = 0;
	foreach(array_count_values($cartArray) as $tID => $lkm){
		$STH = $DBH->query("SELECT tNimi, tHinta FROM 0mrb_tuotteet WHERE tID=$tID;");
		$STH->setFetchMode(PDO::FETCH_OBJ);
		$tuote = $STH->fetch();
		//lkm muutettavissa
		echo '<input type="text" value="'.$lkm.'" size="3" name="tID['.$tID.']">
			  <label>&nbsp;&nbsp;'.$tuote->tNimi.', '.$tuote->tHinta.'€</label>
			  <hr>';
		$yht += $lkm*$tuote->tHinta;
	}
	echo '<span>SUM: '.$yht.'€</span>';
	echo '<input type="submit" value="refresh" class="sininen button">';
} else {
	echo 'Your cart is empty';
}
echo("</form>");
?>