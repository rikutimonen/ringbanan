<?php
@include_once('../config/config.php');
session_set_cookie_params (0, SITE_ROOT); 
session_start();
$cartArray = unserialize($_SESSION['cart']);
$oldCart = array_count_values($cartArray);
$newCart = array();

if(!empty($_POST['tID'])){
	foreach($_POST['tID'] as $tID => $lkm){
		foreach($oldCart as $oldTID => $tarpeeton){
			if($oldTID == $tID){
				for($i = 0; $i < $lkm; $i++){
					$newCart[] =  $tID;
				}
			}
		}
	}
	$_SESSION['cart'] = serialize($newCart);
}
?>