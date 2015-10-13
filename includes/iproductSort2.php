			


					<?php
					   if(/*$_SESSION['taso']>2*/ 1>0) { // *** PLACEHOLDER
					   ?>
					   <h3 class="punainen button">Add a product</h3>
					   <form action="model/mAddProduct.php" class="uutisen-luonti" method="post" id="create-article-form-<?php echo($product->tID);?>">
					      <input type="text" name="otsikko" placeholder="Product name">
					      <br><br>
					      <textarea rows="16" cols="100" name="teksti" placeholder="Product description" form="create-article-form-<?php echo($product->tID);?>"></textarea>
					      <br>
					      <input type="submit" value="Luo artikkeli" class="button">
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

									require_once('model/mproductsSort2.php');
							
								    //Kysely päivittää taulukkoon $tuotteet tuoteolioita
							  		foreach($products as $product){
							          	tulostaTuote($product);
									}
							  ?>

				</div>




