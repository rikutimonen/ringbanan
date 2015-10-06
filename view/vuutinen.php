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
      ?>
      <p><button class="button" data-tid="<?php echo($tuote->tID);?>">Kommentoi</button></p>
   </section>
</div>
