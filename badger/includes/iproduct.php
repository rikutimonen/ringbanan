			

			<div id="sivu">

				<nav class="tuote-nav">
						<ul>
							<?php
							// kategoriat rekursiivisesti
							$kategoriat = haeKategoriat ( $DBH );
							foreach ( $kategoriat as $kateg ) {
							?>
					    			<li>
					        			<?php
								    if ($_GET ['kat'] == $kateg->nav_nimi) {
									?>
					    					<a 	href="<?php echo SITE_ROOT; ?><?php echo $kateg->nav_nimi; ?>"
										class="valittu"><?php echo $kateg->nimi; ?></a>
					            			<?php
										} 
									 else {	?>
					    					<a 	href="<?php echo SITE_ROOT; ?><?php echo $kateg->nav_nimi; ?>"><?php echo $kateg->nimi; ?></a>
					      			<?php
									} ?>
					    			</li>
					    		<?php
							} ?>
					  </ul>
				</nav>			
				<div class="tuotesivu">
					<section class="tuote">
							  <?php
									require_once('model/mproducts.php');
								    //Kysely päivittää taulukkoon $tuotteet tuoteolioita
							  		foreach($products as $product){
							          	tulostaTuote($product);
									}
							  ?>

				</div>

			</div>