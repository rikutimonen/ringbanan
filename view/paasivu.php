<div class="paasivu">
					<div class="main-container">
					<section class="main-content">
							<h2>Otsikko</h2>
							<p>Suomessa tai bataattia sipseiksi eurooppalaisissa opiskelijaruokalan potaatti syövät maa-aineksen kuitenkin sitä perunaa kielissä sialla. Oltava karjalassa kielessä kaljaviestijoukkueen eli tai omena sisältä eurooppalaisissa andeilla koossa</p>
						<div id="checkout"><a href="#" class="orange button">Read more</a></div>
						</article>
					</section>
					</div>
					<div class="main-container">
						<section class="main-content">
							<h2>Latest news:</h2>
							<br>
							<?php
							include("model/mnews.php");
							foreach(array_reverse($uutiset) as $uutinen){
					         $i++;
					         if ($i>3) {
					            break;
					         } else {
					      ?>
					            <section class="uutinen">
					               <article>
					                  <h3 class="article-title"><a href="<?php echo(SITE_ROOT)?>uutiset/<?php echo($uutinen->uutisID);?>"><?php echo($uutinen->otsikko);?></a></h3>
					                  <br>
					                  <p>
											<?php
												echo(substr($uutinen->teksti, 0, 500));
												if(strlen($uutinen->teksti)>500){
											?>
											<a href="<?php echo(SITE_ROOT)?>uutiset/<?php echo($uutinen->uutisID);?>">... Read more</a>
											<?php
												}
											?>
											</p>
					                  <br>
					                  <div class="pvm"><?php echo($uutinen->pvm);?></div>
					                  <a class="comment-link" href="<?php echo(SITE_ROOT)?>uutiset/<?php echo($uutinen->uutisID);?>#comment">Comment</a>
					                  <br>
					               </article>
					            </section>
					            <hr><br>
					         <?php
					         }
					      }
							?>
							<a href="<?php echo(SITE_ROOT)?>uutiset">Go to the news section<a>
						</section>
					</div>


				<!---- FACEBOOK + INSTAGRAM ---->
				<!---- ------------------------->
				<div class="social-feeds">
					<section class ="facebook-feed">
						<article>
							<h2>Facebook</h2>
							<div class="fb-page" data-href="https://www.facebook.com/badgercore" data-small-header="true" data-adapt-container-width="true"
							data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore">
							<blockquote cite="https://www.facebook.com/badgercore"><a href="https://www.facebook.com/badgercore">Mr.Badger</a></blockquote></div></div>
						</article>
					</section>
					<section class ="twitter-feed">
					<article>
						<h2>Twitter</h2>
						<a class="twitter-timeline"
						  data-widget-id="600720083413962752"
						  href="https://twitter.com/mrbadgerband"
						  data-screen-name="mrbadgerband">
						Tweets by @mrbadgerband
						</a>
					</section>
					</article>
				</div>
				<script>
				  window.twttr = (function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0],
					t = window.twttr || {};
				  if (d.getElementById(id)) return t;
				  js = d.createElement(s);
				  js.id = id;
				  js.src = "https://platform.twitter.com/widgets.js";
				  fjs.parentNode.insertBefore(js, fjs);

				  t._e = [];
				  t.ready = function(f) {
					t._e.push(f);
				  };

				  return t;
				}(document, "script", "twitter-wjs"));
				</script>
