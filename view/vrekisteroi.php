<div class="tuotesivu">
    <section class="rekist">
    <h3>Rekisteröityminen</h3>
    Tähdellä merkityt kentät ovat pakollisia.
<form action="vahvistarek" method="post">
	<?php
    if(isset($_SESSION['lomakedata'])):
		$lomakedata = unserialize($_SESSION['lomakedata']);
	?>
	<input type="text" name="data[username]" value="<?php echo $lomakedata['username']; ?>" required><span>*</span>
    <br>
	<input type="text" name="data[enimi]" value="<?php echo $lomakedata['enimi']; ?>" required><span>*</span>
    <br>
	<input type="text" name="data[snimi]" value="<?php echo $lomakedata['snimi']; ?>" required><span>*</span>
    <br>
	<input type="email" name="data[email]" value="<?php echo $lomakedata['email']; ?>" required><span>*</span>
    <br>
	<input type="tel" name="data[puhnro]" value="<?php echo $lomakedata['puhnro']; ?>" required><span>*</span>
    <br>
	<input type="number" name="data[postinro]" value="<?php echo $lomakedata['postinro']; ?>" required><span>*</span>
    <br>
	<input type="text" name="data[kaupunki]" value="<?php echo $lomakedata['kaupunki']; ?>" required><span>*</span>
    <br>
	<input type="text" name="data[osoite]" value="<?php echo $lomakedata['osoite']; ?>" required><span>*</span>
    <br>
    <?php
	else: 
	?>
	<input type="text" name="data[username]" placeholder="Username" required><span>*</span>
    <br>
	<input type="text" name="data[enimi]" placeholder="Surname" required><span>*</span>
    <br>
	<input type="text" name="data[snimi]" placeholder="Lastname" required><span>*</span>
    <br>
	<input type="email" name="data[email]" placeholder="Email" required><span>*</span>
    <br>
	<input type="tel" name="data[puhnro]" placeholder="Phone number" required><span>*</span>
    <br>
	<input type="number" name="data[postinro]" placeholder="Postal code" required><span>*</span>
    <br>
	<input type="text" name="data[kaupunki]" placeholder="City" required><span>*</span>
    <br>
	<input type="text" name="data[osoite]" placeholder="Address" required><span>*</span>
    <br>
    <?php
	endif;
	?>
	<br>
    <input type="password" name="data[pwd]" placeholder="Password" required><span>*</span>
    <br>
    <input type="submit" value="Tallenna">
</form>
</section>
</div>