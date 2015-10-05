<?php include("includes/iheader.php"); ?>
			<div class="banner">
				<div id ="bannerFaded">
					<img src ="assets/img/banner.png" alt="Banneri">
				</div>
			<div class="banner-carousel">
						
						<div>
							<a href="media.html"><img src ="assets/img/music.jpg" alt="Banneri"></a>
						</div>
						
						<div>
							<img src ="assets/img/vuoret.jpg" alt="Banneri">
						</div>
						
						<div>
							<a href="media.html"><img src ="assets/img/music.jpg" alt="Banneri"></a>
						</div>
						
						<div>
							<img src ="assets/img/vuoret.jpg" alt="Banneri">
						</div>
				
				</div>				
			</div>
				
			<div class="audio-player tummansininen">
				
				<button id="pButton" class="play" onclick="fadeIn(); playAudio();"></button>
				<audio id="music">
					<source src="piano.mp3" type="audio/mpeg" />		
				</audio>	
				<div id="info-slide">
					<br>
					<p>Mr. Badger</p>
					<br>
					<h3>Promises...</h3>
				</div>
						
				<script>
					var music = document.getElementById('music');
					var element = document.getElementById('info-slide');
					var button = document.getElementById('pButton');
					var place = 0;
					var buttonPlace = 35;

					function playAudio() {
						if (music.paused) {
							music.play();
							pButton.className = "";
							pButton.className = "pause";
						} else { 
							music.pause();
							pButton.className = "";
							pButton.className = "play";
						}
					}
					
					var fadeIn = function() {
						var op = element.style.opacity;
						element.style.opacity = Number(op) + 0.02;
						if(op < 1){
							window.requestAnimationFrame(function(){
								fadeIn(element);
								slideLeft();
//								slideRight();	
						});
						}else{
							element.style.opacity = 1;
						}
					}
					var slideLeft = function() {
						place += 0.5;
						element.style.right = place+'px';
						if(place < 2){
							window.requestAnimationFrame(slideLeft);
						}
					}	
					var slideRight = function() {
						buttonPlace -= 0.50;
						button.style.right= buttonPlace+'px';
						if(buttonPlace > 24){
							window.requestAnimationFrame(slideRight);
						}
					}		
				</script>
			</div>
			

			
			<div id="paasivu">
				<div class="tuotesivu">
					<section class="tuote">
							<h2>Otsikko</h2>
							<p>Suomessa tai bataattia sipseiksi eurooppalaisissa opiskelijaruokalan potaatti syövät maa-aineksen kuitenkin sitä perunaa kielissä sialla. Oltava karjalassa kielessä kaljaviestijoukkueen eli tai omena sisältä eurooppalaisissa andeilla koossa</p>	
						<div id="checkout"><a href="#" class="punainen button">Lue lisää</a></div>
						</article>
					</section>
				</div>
				
				<div class="social-feeds">
					<section class ="facebook-feed">
						<article>
							<h2>Facebook</h2>
							<div class="fb-page" data-href="https://www.facebook.com/badgercore" data-small-header="true" data-adapt-container-width="true" 
							data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore">
							<blockquote cite="https://www.facebook.com/badgercore"><a href="https://www.facebook.com/badgercore">Mr.Badger</a></blockquote></div></div>				
						</article>
					</section>
					<section class ="instagram-feed">
					<article>
						<h2>Instagram</h2>
						<script src="http://snapwidget.com/js/snapwidget.js"></script>
						<iframe src="http://snapwidget.com/in/?h=bXJiYWRnZXJ8aW58MTI1fDN8M3x8bm98NXxmYWRlT3V0fG9uU3RhcnR8eWVzfHllcw==&ve=051015" title="Instagram Widget" 
						class="snapwidget-widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:100%;"></iframe>	
					</section>
					</article>
				</div>
		
			
			
				<footer class = "tummansininen">
					<p>footer</p>
				</footer>
			</div>
		</div>
			
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/fi_FI/sdk.js#xfbml=1&version=v2.4&appId=238766996179458";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			
			

			
			<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
			<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
			<script type="text/javascript" src="assets/slick/slick.min.js"></script>
			
			<script>
				$(document).ready(function(){
					$('.banner-carousel').slick({
						  slidesToShow: 1,
						  slidesToScroll: 1,
						  autoplay: true,
						  autoplaySpeed: 3000,
						  speed: 3000,
						  fade: true
						
						  
					});
				});
			</script>	
	</body>
</html>