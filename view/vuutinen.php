<div class="uutinen">
   <?php
   include("model/mnewsArticle.php");
   include("model/mnewsArticleComments.php");
   // print_r($uutinen);
   ?>
   <section class="uutinen">
      <article>
         <h3><?php echo($uutinen->otsikko);?></h3>
         <p><?php echo($uutinen->teksti);?></p>
         <p class="pvm"><?php echo($uutinen->pvm);?>
      </article>
   </section>
   <hr>
   <section class="kommentit">
      <h3 class="sininen">Kommentit</h3>
      <?php
      if(empty($uutiskommentit)) {
      ?>
      <p>Ei kommentteja</p>
      <?php
      } else {
         foreach($uutiskommentit as $uutiskommentti) {
         ?>
            <section class="uutinen">
               <article>
                  <a href="#"><?php echo($uutiskommentti->username);?></a>
                  <h4><?php echo($uutiskommentti->otsikko);?></h4>
                  <p><?php echo($uutiskommentti->teksti);?></p>
                  <p class="pvm"><?php echo($uutiskommentti->pvm);?>
               </article>
            </section>
            <hr>
         <?php
         }
      }
      ?>
      <h3 class="sininen">Kommentoi</h3>
      <?php if(/*$_SESSION['taso']>1*/ 1>0) {?>
      <form action="model/mnewsArticleAddComment.php" class="kommentti" method="post" id="commentform-<?php echo($uutinen->uutisID);?>">
         <input type="number" name="k_uutisID" placeholder="ID">
         <br><br>
         <input type="text" name="otsikko" placeholder="Otsikko">
         <br><br>
         <textarea rows="8" cols="100" name="teksti" placeholder="Kirjoita tähän" form="commentform-<?php echo($uutinen->uutisID);?>"></textarea>
         <br>
         <input type="submit" value="Kommentoi" class="button" data-uutisid="<?php echo($uutinen->uutisID);?>">
      </form>
      <?php } else {?>
         <p><a href="#">Kirjaudu sisään kommentoidaksesi</a></p>
      <?php }?>
   </section>
</div>
