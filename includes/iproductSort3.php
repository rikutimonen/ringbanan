			


					<?php
					   if($_SESSION['taso']>2) { 
					   ?>
					   <h3 class="punainen button">Add a product</h3>
					   <form action="model/mAddProduct.php" class="uutisen-luonti" method="post" id="create-article-form-<?php echo($product->tNimi);?>">
					      <input type="text" name="otsikko" placeholder="Product name">
					      <br><br>
					      <textarea rows="16" cols="100" name="teksti" placeholder="Product description" form="create-article-form-<?php echo($product->tKuvaus);?>"></textarea>
					      <br><br>
					      <form action="model/mAddProduct.php" class="uutisen-luonti" method="post" id="create-article-form-<?php echo($product->tHinta);?>">
					      <input type="text" name="otsikko" placeholder="Price">
					      <br>
					      <input type="submit" value="Create product" class="punainen button">
					   </form>
					 <?php
					   }
					   ?>

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
