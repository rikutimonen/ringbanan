 <?php
@include("../functions/functions.php");
@include("../config/config.php");
session_set_cookie_params(0, SITE_ROOT);
session_start();


//This is the directory where images will be saved
$target = "../model/img/gallery/";
$target = $target . basename( $_FILES['photo']['name']);
//This gets all the other information from the form

//Writes the information to the database
try{
	$STH = $DBH->prepare("INSERT INTO 0mrb_kuvat (otsikko, kuvaus, pvm, kuva, thumbnail) VALUES (:otsikko, :kuvaus, now(), :pic, :thumbnail)");
	$STH->bindParam(':otsikko', $_POST['otsikko']);
	$STH->bindParam(':kuvaus', $_POST['kuvaus']);
	$STH->bindParam(':pic', basename($_FILES['photo']['name']));
	$STH->bindParam(':thumbnail', basename($_FILES['photo']['name']));
	$STH->execute();
} catch(PDOException $e) {
    file_put_contents('../log/DBErrors.txt', 'mmediaAddImage.php: ' . $e->getMessage() . "\n", FILE_APPEND);
}

//Writes the photo to the server
if(move_uploaded_file($_FILES['photo']['tmp_name'], $target))
{

//Tells you if its all ok
echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded, and your information has been added to the directory";
}
else {

//Gives and error if its not
echo "Sorry, there was a problem uploading your file.";
}
?>
<?php
/*
try {
   $STH = $DBH->prepare("INSERT INTO 0mrb_kuvat (otsikko, kuvaus, pvm, kuva, thumbnail) VALUES (:otsikko, :kuvaus, now(), :kuva, :thumbnail)");
   $STH->bindParam(':otsikko', $_POST['otsikko']);
   $STH->bindParam(':kuvaus', $_POST['kuvaus']);
   $STH->bindParam(':kuva', $_FILES['fileToUpdate']);
   $STH->bindParam(':thumbnail', $_FILES['fileToUpdate']);
   $STH->execute();

} catch(PDOException $e) {
    file_put_contents('../log/DBErrors.txt', 'mmediaAddImage.php: ' . $e->getMessage() . "\n", FILE_APPEND);
}

//redirect(SITE_ROOT . "uutiset");*/
?>