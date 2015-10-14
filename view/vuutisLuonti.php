<?php
@include("../functions/functions.php");
@include("../config/config.php");

if ($_SESSION['taso']<3) {
   redirect(SITE_ROOT . "uutiset");
} else {
?>
   <div>
      <p><a href="<?php echo(SITE_ROOT)?>uutiset"><-- Palaa uutisiin</a></p>
      <h3 class="ei-sininen">Luo uusi artikkeli</h3>
      <form action="<?php echo(SITE_ROOT)?>model/mnewsAddArticle.php" class="uutisen-luonti" method="post" id="create-article-form-<?php echo($uutinen->uutisID);?>">
         <textarea rows="2" cols="100" name="otsikko" placeholder="Otsikko" form="create-article-form-<?php echo($uutinen->uutisID);?>" required></textarea>
         <br>
         <textarea rows="16" cols="100" name="teksti" placeholder="Kirjoita tähän" form="create-article-form-<?php echo($uutinen->uutisID);?>" required></textarea>
         <br>
         <input type="submit" value="Luo artikkeli" class="orange button">
      </form>
   </div>
<?php
}
?>
