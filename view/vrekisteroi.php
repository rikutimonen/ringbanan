<div class="tuotesivu">
    <section class="rekist">
    <h3>Rekisteröityminen</h3>
    Tähdellä merkityt kentät ovat pakollisia.
<form action="vahvista" method="post">
	<?php
    if(isset($_SESSION['lomakedata'])):
		$lomakedata = unserialize($_SESSION['lomakedata']);
	?>
    <input type="text" name="data[etunimi]" value="<?php echo $lomakedata['etunimi']; ?>" required><span>*</span>
    <br>
    <input type="text" name="data[sukunimi]" value="<?php echo $lomakedata['sukunimi']; ?>" required><span>*</span>
    <br>
    <input type="email" name="data[email]" value="<?php echo $lomakedata['email']; ?>" required><span>*</span>
    <br>
    <input type="tel" name="data[puhelin]" value="<?php echo $lomakedata['puhelin']; ?>" required><span>*</span>
    <br>
    <input type="text" name="data[osoite]" value="<?php echo $lomakedata['osoite']; ?>" required><span>*</span>
    <br>
    <input type="number" name="data[postinumero]" value="<?php echo $lomakedata['postinumero']; ?>" required><span>*</span>
    <br>
    <input type="text" name="data[kaupunki]" value="<?php echo $lomakedata['kaupunki']; ?>" required><span>*</span>
    <?php
	else: 
	?>
    <input type="text" name="data[etunimi]" placeholder="Etunimi" required><span>*</span>
    <br>
    <input type="text" name="data[sukunimi]" placeholder="Sukunimi" required><span>*</span>
    <br>
    <input type="email" name="data[email]" placeholder="Sähköposti" required><span>*</span>
    <br>
    <input type="tel" name="data[puhelin]" placeholder="Puhelin" required><span>*</span>
    <br>
    <input type="text" name="data[osoite]" placeholder="Osoite" required><span>*</span>
    <br>
    <input type="number" name="data[postinumero]" placeholder="Postinumero" required><span>*</span>
    <br>
    <input type="text" name="data[kaupunki]" placeholder="Kaupunki" required><span>*</span>
    <?php
	endif;
	?>
	<br>
    <input type="password" name="data[pwd]" placeholder="Salasana" required><span>*</span>
    <br>
    <input type="submit" value="Tallenna">
</form>
</section>
</div>