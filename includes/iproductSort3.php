				<nav class="tuote-nav">
						<ul>
							<?php
							// kategoriat rekursiivisesti
							$categories = haeKategoriat ( $DBH );
							foreach ( $categories as $categ ) {
							?>
					    			<li>
					        			<?php
								    if ($_GET ['kat'] == $categ->kNimi) {
									?>
					    					<a 	href="<?php echo SITE_ROOT; ?><?php echo $categ->kNimi; ?>"
										class="valittu"><?php echo $categ->kNimi; ?></a>
					            			<?php
										} 
									 else {	?>
					    					<a 	href="<?php echo SITE_ROOT; ?><?php echo $categ->kNimi; ?>"><?php echo $categ->kNimi; ?></a>
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

									require_once('model/mproductsSort3.php');
							
								    //Kysely päivittää taulukkoon $tuotteet tuoteolioita
							  		foreach($products as $product){
							          	tulostaTuote($product);
									}
							  ?>

				</div>
