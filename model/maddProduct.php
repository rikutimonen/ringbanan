<?php
include_once('../config/config.php');
session_set_cookie_params (0, SITE_ROOT);
session_start();
include_once('../functions/functions.php');
// kirjautumisen tarkistus
//if ($_SESSION['taso'] != 2)
	//redirect(SITE_ROOT);


if(!empty($_POST['nimi'])){

	try {
		$STH = $DBH->prepare("INSERT INTO 0mrb_tuotteet (tNimi, tHinta, tKuvaus, katID) VALUES (:nimi, :hinta, :kuvaus, :kategoria)");
		$STH->bindParam(':nimi', $_POST['nimi']);
		$STH->bindParam(':hinta', $_POST['hinta']);
		$STH->bindParam(':kuvaus', $_POST['kuvaus']);
		$STH->bindParam(':kategoria', $_POST['kategoria']);
		$STH->execute();	

	} catch(PDOException $e) {
		file_put_contents('../log/DBErrors.txt', 'addProduct.php: '.$e->getMessage()."\n", FILE_APPEND);
		$_SESSION['viesti'] = 'Tuotteen lisäämisessä ongelma.';
	}
} else {
	$_SESSION['viesti'] = 'Sivulle tultiin vähän mistä sattuu...';
}

if (isset($_FILES['kuva'])){
        $allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');

        /*$uploadedfile = $_FILES['kuva']['tmp_name'];

                list($width,$height)=getimagesize($uploadedfile);

                $newwidth=150;
                $newheight=200;
                $tmp=imagecreatetruecolor($newwidth,$newheight);

                imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight, $width,$height);
		*/

        if (isset($_FILES['kuva'])){
        $allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
        if(in_array($_FILES['kuva']['type'], $allowed)) {
                        if(move_uploaded_file($_FILES['kuva']['tmp_name'], "../assets/img/gallery/{$_FILES['kuva']['name']}")){
                                echo "<p><em>The file has been uploaded! </em></p>";
                        }
        $image="{$_FILES['kuva']['name']}";
        }
}
}

//redirect('../index.php');	

?>
