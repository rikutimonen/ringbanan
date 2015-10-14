<?php
include_once('../config/config.php');
session_set_cookie_params (0, SITE_ROOT);
session_start();
include_once('../functions/functions.php');
// kirjautumisen tarkistus
if ($_SESSION['taso'] != 2)
	redirect(SITE_ROOT);
include_once('../classes/resize-class.php');

function getExtension($str) {

         $i = strrpos($str,".");
         if (!$i) { return ""; } 
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

if(!empty($_POST['nimi'])){

	try {
		$STH = $DBH->prepare("INSERT INTO 0mrb_tuotteet (tNimi, tHinta, tKuvaus, katID) VALUES (:nimi, :hinta, :kuvaus, :kategoria");
		$STH->bindParam(':nimi', $_POST['nimi']);
		$STH->bindParam(':hinta', $_POST['hinta']);
		$STH->bindParam(':kuvaus', $_POST['kuvaus']);
		$STH->bindParam(':kategoria', $_POST['kategoria']);
		$STH->execute();
			$tuoteID = $DBH->prepare("SELECT tID FROM 0mrb_tuotteet ORDER BY 1 DESC");
			$target_dir = "../../verkkokauppa/assets/img/";
			
			if($image){
            	$filename = $_FILES['kuva']['name'];
            	$extension = strtolower(getExtension($filename));
            		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")){
	                	echo ' Unknown Image extension ';
	                	$errors=1;
	                	} else{
			                $newname = "$product_cn."."$extension";
			                $size=filesize($_FILES['fileField']['tmp_name']);
				        }
			if($extension=="jpg" || $extension=="jpeg" ){
                    $uploadedfile = $_FILES['kuva']['tmp_name'];
                    $src = imagecreatefromjpeg($uploadedfile);
                }else if($extension=="png"){
                    $uploadedfile = $_FILES['kuva']['tmp_name'];
                    $src = imagecreatefrompng($uploadedfile);
                }else{
					$_SESSION['viesti'] = 'Kuva väärää formaattia.';
					redirect('../index.php');
				}
                list($width,$height)=getimagesize($uploadedfile);

                $newwidth=150;
                $newheight=200;
                $tmp=imagecreatetruecolor($newwidth,$newheight);
						

//			- alkuperäinen kuva kansioon alkupKuvat
			$target_file = $target_dir . 'pikkukuvat/'.$tuoteID.'.'.$ext;
			
			if (move_uploaded_file($_FILES["kuva"]["tmp_name"], $target_file)) {

				if(file_exists($filename)){
					$_SESSION['viesti'] = 'Tuote "'.$_POST['nimi'].'" lisätty';
				}
			} else {
				$_SESSION['viesti'] = 'Joku erhe kuvan kanssa';
			}
		}
	} catch(PDOException $e) {
		file_put_contents('../log/DBErrors.txt', 'addProduct.php: '.$e->getMessage()."\n", FILE_APPEND);
		$_SESSION['viesti'] = 'Tuotteen lisäämisessä ongelma.';
	}
} else {
	$_SESSION['viesti'] = 'Sivulle tultiin vähän mistä sattuu...';
}

redirect('../index.php');	

?>