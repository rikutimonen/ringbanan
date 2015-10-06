<?php
	//Navigaatio, joka näkyy jokaisella sivulla
	include("includes/iheader.php");
	
	//Vaihtuva banneri, joka näkyy vain etusivulla
	include("includes/ibanner.php");
?>
			<div class="audio-player dark-gray">
				
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
			

			
			<div class="paasivu">
				<div class="tuotesivu">
					<section class="tuote">
							<h2>Otsikko</h2>
							<p>Suomessa tai bataattia sipseiksi eurooppalaisissa opiskelijaruokalan potaatti syövät maa-aineksen kuitenkin sitä perunaa kielissä sialla. Oltava karjalassa kielessä kaljaviestijoukkueen eli tai omena sisältä eurooppalaisissa andeilla koossa</p>	
						<div id="checkout"><a href="#" class="orange button">Read more</a></div>
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
						<p>#badgerbadger</p>
						<!-- INSTANSIVE WIDGET --><script src="//instansive.com/widget/js/instansive.js"></script><iframe src="//instansive.com/widgets/ebc9fb6653ea5ad670f6801acceb66d79f9b8cb9.html" 
						id="instansive_ebc9fb6653" name="instansive_ebc9fb6653"  scrolling="no" allowtransparency="true" class="instansive-widget" style="width: 100%; border: 0; overflow: hidden;"></iframe>
					</section>
					</article>
				</div>
		
			
			
				<footer class = "dark-gray">
					<p>footer</p>
				</footer>
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
						  lazyLoad: 'ondemand',
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