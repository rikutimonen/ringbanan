<div class="uutiset">
   <h2>Uutiset</h2>
   <?php
      include("model/mnews.php");
      // print_r($uutiset);
   ?>

   <?php
   foreach($uutiset as $uutinen){
   ?>
      <section class="uutinen">
         <article>
            <a href="<?php echo(SITE_ROOT)?>uutiset/<?php echo($uutinen->uutisID);?>"><h3><?php echo($uutinen->otsikko);?></h3></a>
            <p><?php echo($uutinen->teksti);?></p>
            <p class="pvm"><?php echo($uutinen->pvm);?>
            <a href="#">Kommentoi</a>
            <a href="#">Jaa</a>
         </article>
      </section>
      <hr>
   <?php
   }
   ?>
   <a href="#">Näytä useampia</a>
</div>
