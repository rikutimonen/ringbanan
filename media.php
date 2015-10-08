			<div class="paasivu">
				<div class="soundcloud-player">
				<h2>Music</h2>
				<div class="mediasisalto">
					<iframe width="100%" height="300" scrolling="no" frameborder="no" 
					src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/users/115459114&amp;color=068cb8&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
					</div>
				</div>
			
				<!--YouTube-videot-->
				<div class="media-section">
				
					<div class="header">
						<h2>Music videos</h2>
					</div>
				
					<section class="mediasisalto">

					<h3> Mr. Badger - Gay Satan</h3>
						<iframe width="460" height="315" src="https://www.youtube.com/embed/rM11pn26Ky0" frameborder="0" allowfullscreen></iframe>

					<h3> Mr. Badger - Mercury</h3>
						<iframe width="460" height="315" src="https://www.youtube.com/embed/L9DcmNWKRrY" frameborder="0" allowfullscreen></iframe>
					</section>
				</div>
				
							<!--Kuvagalleria-->
				<div class="media-section">
				<div class="header">
					<h2>Image gallery</h2>
				</div>
						<div class="mediasisalto">
						<div id='gallery' class='gallery'>
						  <div id='lg-wrap' class='current-image-wrapper'>
							<img id='large' data-idx='0' src='http://lorempixel.com/400/480/'>
						  </div>
						  <ul id='thumbnails' class='thumbnails'>
							<li>
							  <a href='http://lorempixel.com/400/480/'>
								<img data-idx='0' src='http://lorempixel.com/400/480/'>
							  </a>
							</li>
							<li>
							  <a href='http://lorempixel.com/401/480/'>
								<img data-idx='1' src='http://lorempixel.com/401/480/'>
							  </a>
							</li>
							<li>
							  <a href='http://lorempixel.com/399/480/'>
								<img data-idx='2' src='http://lorempixel.com/399/480/'>
							  </a>
							</li>
						  </ul>
						</div>
					</div>
			</div>
		</div>
			<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
			<script>
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
				
				$(".header").click(function () {
					$header = $(this);
					//getting the next element
					$mediasisalto = $header.next();
					//open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
					$mediasisalto.slideToggle(500, function () {
						//execute this after slideToggle is done
						//change text of header based on visibility of content div
						$header.text(function () {
							//change text based on condition
						 //   return $tuote.is(":visible") ? "Image gallery" : "Image gallery";
						});
					});
				});
			</script>	