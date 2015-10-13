<div class="audio-player dark-gray">
				
				<button id="pButton" class="play" onclick="fadeIn(); playAudio();"></button>
				<audio id="music">
					<source src="preview.mp3" type="audio/mpeg" />		
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
					music.onended = function(){
							pButton.style.opacity = 0;
							document.getElementById('info-slide').innerHTML = "<?php echo("<a href='")?><?php echo(SITE_ROOT)?><?php echo("mediat'>More at Media-section</a>")?>";
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