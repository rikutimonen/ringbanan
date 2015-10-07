 	<div class="tuotesivu">
		<section class="tuote">
		<?php
		    require_once('model/mproduct.php');  //Haetaan tämän tuotteen tiedot
		?>
			<article>
            <h2><?php echo $product->nimi; ?></h2>
            <div class="hinta"><?php echo $product->hinta; ?>€</div>
            <img src="assets/img/tuotekuvat/<?php echo $product->tID; ?>">
            <p><?php echo $product->kuvaus; ?></p>
            <p><button class="koriin button punainen" data-tid="<?php echo $product->tID; ?>">Add to cart</button></p>
          </article>
		</section>
    </div>
    