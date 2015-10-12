<div class="uutiset">
   <h2>News</h2>
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
   if(isset($_GET['show'])) {
      $limit=$_GET['show'];
   } else {
      $limit=10;
   }
   foreach(array_reverse($uutiset) as $uutinen){
      $i++;
      if ($i>$limit) {
         break;
      } else {
   ?>
         <section class="uutinen">
            <article class="main-content">
               <h3><a href="<?php echo(SITE_ROOT)?>uutiset/<?php echo($uutinen->uutisID);?>"><?php echo($uutinen->otsikko);?></a></h3>
               <p><?php echo($uutinen->teksti);?></p>
               <p class="pvm"><?php echo($uutinen->pvm);?>
               <a href="<?php echo(SITE_ROOT)?>uutiset/<?php echo($uutinen->uutisID);?>#kommentoi">Comment</a>
               <?php
               if($_SESSION['taso']>2) {
               ?>
                  <form action="<?php echo(SITE_ROOT)?>model/mnewsDeleteArticle.php?uutisid=<?php echo($uutinen->uutisID);?>" method="post" class="delete-form">
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
   }
   ?>
   <a name="showmore" href="<?php echo(SITE_ROOT)?>index.php?osio=uutiset&show=<?php echo($limit+10);?>#showmore">Displaying up to <?php echo($limit);?> articles. Show more:</a>
</div>
