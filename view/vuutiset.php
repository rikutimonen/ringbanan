<div class="uutiset">
   <section class="main-content">
      <div class="news-section-title"><h2>News</h2></div>
      <?php
         include("model/mnews.php");
         // print_r($uutiset);
      ?>

      <?php
      if($_SESSION['taso']>2) {
      ?>
		<article>
         <a href="<?php echo(SITE_ROOT)?>uutiset/uusi_artikkeli/luo"><button type="button" name="button" class="button orange">Luo uusi artikkeli</button></a>
		</article>
	 <?php
      }
      ?>

      <?php
      if(isset($_GET['show'])) {
         $limit=$_GET['show'];
      } else {
         $limit=5;
      }
      foreach(array_reverse($uutiset) as $uutinen){
         $i++;
         if ($i>$limit) {
            break;
         } else {
      ?>
            <section class="uutinen">
               <article>
                  <h3 class="article-title"><a href="<?php echo(SITE_ROOT)?>uutiset/<?php echo($uutinen->uutisID);?>"><?php echo($uutinen->otsikko);?></a></h3>
                  <br>
                  <p><?php echo($uutinen->teksti);?></p>
                  <br>
                  <div class="pvm"><?php echo($uutinen->pvm);?></div>
                  <a class="comment-link" href="<?php echo(SITE_ROOT)?>uutiset/<?php echo($uutinen->uutisID);?>#comment">Comment</a>
                  <br>
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
            <hr><br>
      <?php
         }
      }
      ?>
      <a name="showmore" href="<?php echo(SITE_ROOT)?>index.php?osio=uutiset&show=<?php echo($limit+10);?>#showmore">
      <?php if(sizeof($uutiset)>$limit) {?>
         Displaying up to <?php echo($limit);?> articles. Show more:
      <?php }?>
      </a>

   </section>
</div>
