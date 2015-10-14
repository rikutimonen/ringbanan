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
			
			
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/fi_FI/sdk.js#xfbml=1&version=v2.4&appId=238766996179458";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
		
			<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
			<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
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