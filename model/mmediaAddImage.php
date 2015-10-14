 <?php
@include("../functions/functions.php");
@include("../config/config.php");
session_set_cookie_params(0, SITE_ROOT);
session_start();

if (isset($_FILES['upload'])){
	$allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
	if(in_array($_FILES['upload']['type'], $allowed)) {
			if(move_uploaded_file($_FILES['upload']['tmp_name'], "../assets/img/gallery/{$_FILES['upload']['name']}")){
				echo "<p><em>The file has been uploaded! </em></p>";
			}
	$image="{$_FILES['upload']['name']}";
	}
}

try{
	$STH = $DBH->prepare("INSERT INTO 0mrb_kuvat (otsikko, kuvaus, pvm, kuva, thumbnail) VALUES (:otsikko, :kuvaus, now(), :pic, :thumbnail)");
	$STH->bindParam(':otsikko', $_POST['otsikko']);
	$STH->bindParam(':kuvaus', $_POST['kuvaus']);
	$STH->bindParam(':pic', $image);
	$STH->bindParam(':thumbnail', $image);
	$STH->execute();
} catch(PDOException $e) {
    file_put_contents('../log/DBErrors.txt', 'mmediaAddImage.php: ' . $e->getMessage() . "\n", FILE_APPEND);
}

//if (isset($_FILES['upload'])){
echo ($_POST['otsikko']);
echo ($_POST['kuvaus']);
echo ($_FILES['upload']['name']);

/*
//Writes the photo to the server
if(move_uploaded_file($_FILES['photo']['tmp_name'], $target))
{

//Tells you if its all ok
echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded, and your information has been added to the directory";
}
else {

//Gives and error if its not
echo "Sorry, there was a problem uploading your file.";
}*/
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