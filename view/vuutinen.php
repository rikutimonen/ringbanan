<div class="uutiset">
   <section class="main-content">
      <?php
      include("model/mnewsArticle.php");
      include("model/mnewsArticleComments.php");
      // print_r($uutinen);
      ?>
      <section class="uutinen">
         <p><a href="<?php echo(SITE_ROOT)?>uutiset"><-- Back to news</a></p>
         <article>
            <h3><?php echo($uutinen->otsikko);?></h3>
            <br>
            <p><?php echo($uutinen->teksti);?></p>
            <br>
            <div class="pvm"><?php echo($uutinen->pvm);?>
            <hr>
         </article>
      </section>

      <?php
      if($_SESSION['taso']>2) {
      ?>
         <button type="button" name="button" class="button toggle-hidden orange" data-target="artikkeli-muokkaus">Muokkaa</button>
         <hr>
         <div id="artikkeli-muokkaus" style="display: none;">
            <h3 class="ei-sininen">Muokkaa artikkelia</h3>
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
         <h3 class="ei-sininen">Comments</h3>
         <?php
         if(empty($uutiskommentit)) {
         ?>
         <p>No comments yet.</p>
         <?php
         } else {
            if(isset($_GET['show'])) {
               $limit=$_GET['show'];
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
                     <div class="posted-by">Posted by: <a href="#"><?php echo($uutiskommentti->username);?></a></div>
                     <br>
                     <h4><?php echo(strip_tags($uutiskommentti->otsikko));?></h4>
                     <p><?php echo(strip_tags($uutiskommentti->teksti));?></p>
                     <br>
                     <div class="pvm"><?php echo($uutiskommentti->pvm);?></div>
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
               <br>
         <?php
               }
            }
            if(sizeof($uutiskommentit)>$limit) {
         ?>
         <a name="showmore" href="<?php echo(SITE_ROOT)?>index.php?osio=uutiset&uutisid=<?php echo($uutinen->uutisID);?>&show=<?php echo($limit+20);?>#showmore">Displaying up to <?php echo($limit);?> comments. Show more:</a>
         <?php
            }
         }
         ?>

         <a name=comment><h3 class="ei-sininen">Comment</h3></a>

         <?php
         if($_SESSION['taso']>1) {
         ?>
         <form action="<?php echo(SITE_ROOT)?>model/mnewsArticleAddComment.php?uutisid=<?php echo($uutinen->uutisID);?>" class="kommentti" method="post" id="commentform-<?php echo($uutinen->uutisID);?>">
            <textarea rows="1" cols="80" name="otsikko" placeholder="Title" form="commentform-<?php echo($uutinen->uutisID);?>"></textarea>
            <br>
            <textarea rows="8" cols="80" name="teksti" placeholder="Type here" form="commentform-<?php echo($uutinen->uutisID);?>" required></textarea>
            <br>
            <input type="submit" value="Comment" class="orange button" data-uutisid="<?php echo($uutinen->uutisID);?>">
         </form>
         <?php
         } else {
         ?>
            <p><a href="#" class="open-modal" data-target="log-modal">Log in to comment.</a></p>
         <?php
         }
         ?>
      </section>
   </section>
</div>
