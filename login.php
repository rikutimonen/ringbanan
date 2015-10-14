<?php
require_once('config/config.php');
session_set_cookie_params (0, SITE_ROOT);
session_start();
require_once('functions/functions.php');
SSLon();
//T�nne tullaan kun ilog_sin.php lomakkeella painetaan Kirjaudu painiketta
//Kayttaja/salasana kannassa?
//user oliossa kayttajatiedot jos ok, muuten false

$user = login($_POST['email'], $_POST['pwd'], $DBH);
//print_r($_POST['email'] . $_POST['pwd']);
if(!$user){
	$_SESSION['loggausvirhe'] = 'jep';
	print_r("ei useria");
	//Aiheuttaa alert() pääsivulla
	redirect(SITE_ROOT);
} else {
	unset($_SESSION['loggausvirhe']);
	//Jos k�ytt�j� tunnistettiin, talletetaan tiedot sessioon esim. kassalle siirtymist�
	//varten on hyv� tiet�� asiakastiedot
	$_SESSION['kirjautunut'] = true;
	$_SESSION['userid'] = $user->userID;
	$_SESSION['username'] = $user->username;
	$_SESSION['enimi'] = $user->enimi;
	$_SESSION['snimi'] = $user->snimi;
	$_SESSION['email'] = $user->email;
	$_SESSION['puhnro'] = $user->puhnro;
	$_SESSION['postinro'] = $user->postinro;
	$_SESSION['kaupunki'] = $user->kaupunki;
	$_SESSION['osoite'] = $user->osoite;
	$_SESSION['taso'] = $user->taso;
	print_r($_SESSION);
	print_r("useri?");
	//Jos loggaus onnistuu niin palataan paasivulle
	redirect(SITE_ROOT);
}


?>
