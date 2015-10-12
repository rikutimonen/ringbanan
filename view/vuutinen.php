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

   <?php
   if($_SESSION['taso']>2) {
   ?>
      <button type="button" name="button" class="button toggle-hidden orange" data-target="artikkeli-muokkaus">Muokkaa</button>
      <hr>
      <div id="artikkeli-muokkaus" style="display: none;">
         <h3 class="sininen">Muokkaa artikkelia</h3>
         <form action="<?php echo(SITE_ROOT)?>model/mnewsModifyArticle.php?uutisid=<?php echo($uutinen->uutisID);?>" class="uutisen-muokkaus" method="post" id="modify-article-form-<?php echo($uutinen->uutisID);?>">
            <textarea rows="2" cols="100" name="otsikko" placeholder="Otsikko" form="modify-article-form-<?php echo($uutinen->uutisID);?>" required><?php echo($uutinen->otsikko);?></textarea>
            <br>
            <textarea rows="16" cols="100" name="teksti" placeholder="Kirjoita tähän" form="modify-article-form-<?php echo($uutinen->uutisID);?>" required><?php echo($uutinen->teksti);?></textarea>
            <br>
            <input type="submit" value="Tallenna muutokset" class="orange button">
         </form>
         <hr>
      </div>
   <?php
   }
   ?>

   <section class="kommentit">
      <h3 class="sininen">Kommentit</h3>
      <?php
      if(empty($uutiskommentit)) {
      ?>
      <p>Ei kommentteja</p>
      <?php
      } else {
         if(isset($_GET['nayta'])) {
            $limit=$_GET['nayta'];
         } else {
            $limit=20;
         }
         foreach(array_reverse($uutiskommentit) as $uutiskommentti) {
            $i++;
            if ($i>$limit) {
               break;
            } else {
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
                     <form action="<?php echo(SITE_ROOT)?>model/mnewsArticleDeleteComment.php?kommenttiid=<?php echo($uutiskommentti->kommenttiid);?>&uutisid=<?php echo($uutinen->uutisID);?>" method="post" class="delete-form">
                        <input type="submit" value="Poista kommentti" class="red button" data-uutisid="<?php echo($uutiskommentti->k_uutisID);?>">
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
      }
      ?>
      <a name="showmore" href="<?php echo(SITE_ROOT)?>index.php?osio=uutiset&uutisid=<?php echo($uutinen->uutisID);?>&nayta=<?php echo($limit+20);?>#showmore">Näytetään <?php echo($limit);?> kommenttia. Näytä useampia:</a>

      <a name=kommentoi><h3 class="sininen">Kommentoi</h3></a>

      <?php
      if($_SESSION['taso']>1) {
      ?>
      <form action="<?php echo(SITE_ROOT)?>model/mnewsArticleAddComment.php?uutisid=<?php echo($uutinen->uutisID);?>" class="kommentti" method="post" id="commentform-<?php echo($uutinen->uutisID);?>">
         <textarea rows="1" cols="80" name="otsikko" placeholder="Otsikko" form="commentform-<?php echo($uutinen->uutisID);?>"></textarea>
         <br>
         <textarea rows="8" cols="80" name="teksti" placeholder="Kirjoita tähän" form="commentform-<?php echo($uutinen->uutisID);?>" required></textarea>
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
