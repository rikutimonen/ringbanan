<?php
include_once('config/config.php');
session_set_cookie_params (0, SITE_ROOT);
session_start();
include_once('functions/functions.php');
SSLon();
?>

<?php if ($_SESSION['taso']==3) {
?>
<div class="row">
  <div class="large-12 columns">
    <h3>Lisää tuote</h3>
<form action="model/maddProduct.php" method="post" enctype="multipart/form-data">
<div class="row">
  <div class="large-12 columns">
    <label>Nimi
      <input type="text" name="nimi" tabindex="1">
    </label>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <label>Kuvaus
    <textarea name="kuvaus" cols="15" rows="10" tabindex="2"></textarea>
    </label>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <label>Hinta
      <input type="text" name="hinta" tabindex="3">
    </label>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <label>Kategoria
      <select name="kategoria" tabindex="4">
      	<?php
			require_once("model/mgetCategories.php");
		?>
      </select>
    </label>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <label>ID
      <input type="int" name="tuoteid" tabindex="5">
    </label>
  </div>
<div class="row">
  <div class="large-12 columns">
  <label>Kuva
  <input name="kuva" type="file">
  </label>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
  <input name="submit" type="submit" value="Tallenna" class="button" tabindex="6">
  </div>
</div>
</form>
</div>
</div>
<?php 
}

?>