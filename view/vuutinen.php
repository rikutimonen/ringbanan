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
      <form class="" method="post">
         <textarea rows="8" cols="100" name="kommentti" placeholder="Kirjoita tähän" form="usrform"></textarea>
         <br>
         <input type="submit" value="Kommentoi" class="button" data-uutisid="<?php echo($uutiskommentti->uutisID);?>">
      </form>
   </section>
</div>
