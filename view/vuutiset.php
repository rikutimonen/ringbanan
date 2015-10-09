<div class="uutiset">
   <h2>Uutiset</h2>
   <?php
      include("model/mnews.php");
      // print_r($uutiset);
   ?>

   <?php
   if($_SESSION['taso']>2) {
   ?>
      <a href="<?php echo(SITE_ROOT)?>uutiset/uusi_artikkeli/luo"><button type="button" name="button" class="button orange">Luo uusi artikkeli</button></a>
   <?php
   }
   ?>

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
            if($_SESSION['taso']>2) {
            ?>
               <form action="<?php echo(SITE_ROOT)?>model/mnewsDeleteArticle.php?uutisid=<?php echo($uutinen->uutisID);?>" method="post">
                  <input type="submit" value="Poista artikkeli" class="red button" data-uutisid="<?php echo($uutinen->uutisID);?>">
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
