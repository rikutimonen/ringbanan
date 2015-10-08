<?php
//Tääsäkin olisi tavaraa joka kuuluisi toiseen paikkaan model/
require_once('config/config.php');
session_set_cookie_params (0, SITE_ROOT); 
session_start();
require_once('functions/functions.php');
SSLon();

$userdata = unserialize($_SESSION['lomakedata']);  //testimuodosta takaisin taulukoksi

$data['email'] = $userdata['email'];
try {
	$STH = $DBH->prepare("SELECT * FROM 0mrb_users WHERE email=:email");
	$STH->execute($data);
	$row = $STH->fetch();  //Löytyiko sama email osoite?
	if($STH->rowCount() == 0){ //Jos ei niin rekisteröidään
		// lisää suola '!!'
		$userdata['pwd'] = md5($userdata['pwd'].'!!');  //hashataan salasana
		
		try {
			$STH2 = $DBH->prepare("INSERT INTO 0mrb_users (username, enimi, snimi, email, puhnro, postinro, kaupunki, osoite, pwd)
								   VALUES (:username, :enimi, :snimi, :email, :puhnro, :postinro, :kaupunki, :osoite, :pwd)");
			if($STH2->execute($userdata)){
				
					try { 
					//Jos käyttäjän tallennus onnistui asetetaan hänet loggautuneeksi 	
					$sql = "SELECT * FROM 0mrb_users WHERE userID = ".$DBH->lastInsertId().";";
					$STH3 = $DBH->query($sql);
					$STH3->setFetchMode(PDO::FETCH_OBJ);
					$user = $STH3->fetch();
					$_SESSION['kirjautunut'] = 'jep';
					$_SESSION['username'] = $user->username;
					$_SESSION['enimi'] = $user->enimi;
					$_SESSION['snimi'] = $user->snimi;
					$_SESSION['email'] = $user->email;
					$_SESSION['puhnro'] = $user->puhnro;
					$_SESSION['postinro'] = $user->postinro;
					$_SESSION['kaupunki'] = $user->kaupunki;
					$_SESSION['osoite'] = $user->osoite;
					redirect(SITE_ROOT);  //Palaa heti idex.php sivulle
				} catch(PDOException $e) {
					echo 'Käyttäjän tietojen hakuerhe';
					file_put_contents('log/DBErrors.txt', 'tallennaKayttaja 3: '.$e->getMessage()."\n", FILE_APPEND);
				}
			}
		} catch(PDOException $e) {
			echo 'Tietojen lisäyserhe';
			file_put_contents('log/DBErrors.txt', 'tallennaKayttaja 2: '.$e->getMessage()."\n", FILE_APPEND);
		}
	} else {
		echo 'Käyttäjä on jo olemassa.';
	}
} catch(PDOException $e) {
	echo 'Tietokantaerhe.';
	file_put_contents('log/DBErrors.txt', 'tallennaKayttaja 1: '.$e->getMessage()."\n", FILE_APPEND);
}

?>