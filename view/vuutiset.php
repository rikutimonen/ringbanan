<div class="uutiset">
   <h2>Uutiset</h2>
   <?php
      include("model/mnews.php");
      // print_r($uutiset);
   ?>

   <?php
   if(/*$_SESSION['taso']>2*/ 1>0) { // *** PLACEHOLDER
   ?>
   <div class="artikkeli-kirjoitus">
      <h3 class="sininen">Luo uusi artikkeli</h3>
      <form action="<?php echo(SITE_ROOT)?>model/mnewsAddArticle.php" class="uutisen-luonti" method="post" id="create-article-form-<?php echo($uutinen->uutisID);?>">
         <input type="text" name="otsikko" placeholder="Otsikko">
         <br><br>
         <textarea rows="16" cols="100" name="teksti" placeholder="Kirjoita tähän" form="create-article-form-<?php echo($uutinen->uutisID);?>"></textarea>
         <br>
         <input type="submit" value="Luo artikkeli" class="orange button">
      </form>
      <?php
      }
      ?>
   </div>

   <?php
   foreach($uutiset as $uutinen){
   ?>
      <section class="uutinen">
         <article class="main-content">
            <a href="<?php echo(SITE_ROOT)?>uutiset/<?php echo($uutinen->uutisID);?>"><h3><?php echo($uutinen->otsikko);?></h3></a>
            <p><?php echo($uutinen->teksti);?></p>
            <p class="pvm"><?php echo($uutinen->pvm);?>
            <a href="#">Kommentoi</a>
            <a href="#">Jaa</a>
            <?php
            if(/*$_SESSION['taso']>2*/ 1>0) { // *** PLACEHOLDER
            ?>
               <form action="<?php echo(SITE_ROOT)?>model/mnewsDeleteArticle.php?uutisid=<?php echo($uutinen->uutisID);?>" method="post">
                  <input type="submit" value="Poista artikkeli" class="orange button" data-uutisid="<?php echo($uutinen->uutisID);?>">
               </form>
            <?php
            }
            ?>
         </article>
      </section>
      <hr>
   <?php
   }
   ?>
   <a href="#">Näytä useampia</a>
</div>
