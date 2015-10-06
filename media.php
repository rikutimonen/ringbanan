 <?php
	//Navigaatio, joka näkyy jokaisella sivulla
	include("includes/iheader.php");
	
	include("includes/ibanner.php");
?>									
			<div class="paasivu">
			<!--Kuvagalleria-->
				<div class="media-section">
					<section class="tuote">
						<h2>Image gallery</h2>	
						<div id='gallery' class='gallery'>
						  <div id='lg-wrap' class='current-image-wrapper'>
							<img id='large' data-idx='0' src='http://lorempixel.com/640/480/'>
						  </div>
						  <ul id='thumbnails' class='thumbnails'>
							<li>
							  <a href='http://lorempixel.com/640/480/'>
								<img data-idx='0' src='http://lorempixel.com/640/480/'>
							  </a>
							</li>
							<li>
							  <a href='http://lorempixel.com/641/480/'>
								<img data-idx='1' src='http://lorempixel.com/641/480/'>
							  </a>
							</li>
							<li>
							  <a href='http://lorempixel.com/639/480/'>
								<img data-idx='1' src='http://lorempixel.com/639/480/'>
							  </a>
							</li>
						  </ul>
						</div>
					</section>
				</div>

				<!--YouTube-videot-->
				<div class="media-section">
					<section class="tuote">
							<h2>Music Videos</h2>	

					<h3> Mr. Badger - Gay Satan</h3>
						<iframe width="560" height="315" src="https://www.youtube.com/embed/rM11pn26Ky0" frameborder="0" allowfullscreen></iframe>

					<h3> Mr. Badger - Mercury</h3>
						<iframe width="560" height="315" src="https://www.youtube.com/embed/L9DcmNWKRrY" frameborder="0" allowfullscreen></iframe>
					</section>
				</div>
				
				<footer class = "dark-gray">
					<p>footer</p>
				</footer>
			</div>
		</div>
			
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
				
				var th = document.getElementById('thumbnails');

				th.addEventListener('click', function(e) {
				  var t = e.target, new_src = t.parentNode.href, 
					  large = document.getElementById('large'),
					  cl = large.classList,
					  lgwrap = document.getElementById('lg-wrap');
				  lgwrap.style.backgroundImage = 'url(' +large.src + ')';
				  if(cl) cl.add('hideme');
				  window.setTimeout(function(){
					large.src = new_src;
					if(cl) cl.remove('hideme');
				  }, 50);
				  e.preventDefault();
				}, false);
				
			</script>	
	</body>
</html>