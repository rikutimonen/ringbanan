<div>
   <?php
   include("model/mnewsArticle.php");
   include("model/mnewsArticleComments.php");
   // print_r($uutinen);
   ?>
   <section class="uutinen">
      <p><a href="<?php echo(SITE_ROOT)?>uutiset"><-- Palaa uutisiin</a></p>
      <article>
         <h3><?php echo($uutinen->otsikko);?></h3>
         <p><?php echo($uutinen->teksti);?></p>
         <p class="pvm"><?php echo($uutinen->pvm);?>
      </article>
   </section>
   <hr>

   <?php
   if($_SESSION['taso']>2) {
   ?>
   <div class="artikkeli-kirjoitus">
      <h3 class="sininen">Muokkaa artikkelia</h3>
      <form action="<?php echo(SITE_ROOT)?>model/mnewsModifyArticle.php?uutisid=<?php echo($uutinen->uutisID);?>" class="uutisen-muokkaus" method="post" id="modify-article-form-<?php echo($uutinen->uutisID);?>">
         <input type="text" name="otsikko" placeholder="Otsikko" value="<?php echo($uutinen->otsikko);?>">
         <br><br>
         <textarea rows="16" cols="100" name="teksti" placeholder="Kirjoita tähän" form="modify-article-form-<?php echo($uutinen->uutisID);?>"><?php echo($uutinen->teksti);?></textarea>
         <br>
         <input type="submit" value="Tallenna muutokset" class="orange button">
      </form>
      <hr>
      <?php
      }
      ?>
   </div>

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
               <article class="kommentti">
                  <a href="#"><?php echo($uutiskommentti->username);?></a>
                  <h4><?php echo($uutiskommentti->otsikko);?></h4>
                  <p><?php echo($uutiskommentti->teksti);?></p>
                  <p class="pvm"><?php echo($uutiskommentti->pvm);?></p>
                  <?php
                  if($_SESSION['taso']>2) {
                  ?>
                     <form action="<?php echo(SITE_ROOT)?>model/mnewsArticleDeleteComment.php?kommenttiid=<?php echo($uutiskommentti->kommenttiid);?>" method="post">
                        <input type="submit" value="Poista kommentti" class="orange button" data-uutisid="<?php echo($uutiskommentti->k_uutisID);?>">
                     </form>
                  <?php
                  }
                  ?>
               </article>
            </section>
            <hr>
      <?php
         }
      }
      ?>
      <h3 class="sininen">Kommentoi</h3>
      <?php
      if(/*$_SESSION['taso']>1*/ 1>0) { // *** PLACEHOLDER
         $_SESSION['uutisid'] = $uutinen->uutisID;
         $_SESSION['userid'] = 1;
      ?>
      <form action="<?php echo(SITE_ROOT)?>model/mnewsArticleAddComment.php" class="kommentti" method="post" id="commentform-<?php echo($uutinen->uutisID);?>">
         <input type="text" name="otsikko" placeholder="Otsikko">
         <br><br>
         <textarea rows="8" cols="100" name="teksti" placeholder="Kirjoita tähän" form="commentform-<?php echo($uutinen->uutisID);?>"></textarea>
         <br>
         <input type="submit" value="Kommentoi" class="orange button" data-uutisid="<?php echo($uutinen->uutisID);?>">
      </form>
      <?php
      } else {
      ?>
         <p><a href="#">Kirjaudu sisään kommentoidaksesi</a></p>
      <?php
      }
      ?>
   </section>
</div>
