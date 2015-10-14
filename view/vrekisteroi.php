<div class="tuotesivu">
    <section class="rekist">
    <h3>Rekisteröityminen</h3>
    Tähdellä merkityt kentät ovat pakollisia.
<form action="vahvistarek" method="post">
	<?php
    if(isset($_SESSION['lomakedata'])):
		$lomakedata = unserialize($_SESSION['lomakedata']);
	?>
	<input type="text" name="data[username]" value="<?php echo $lomakedata['username']; ?>" username><span>*username</span>
    <br>
	<input type="text" name="data[enimi]" value="<?php echo $lomakedata['enimi']; ?>" enimi><span>*enimi</span>
    <br>
	<input type="text" name="data[snimi]" value="<?php echo $lomakedata['snimi']; ?>" snimi><span>*snimi</span>
    <br>
	<input type="email" name="data[email]" value="<?php echo $lomakedata['email']; ?>" email><span>*email</span>
    <br>
	<input type="tel" name="data[puhnro]" value="<?php echo $lomakedata['puhnro']; ?>" puhnro><span>*puhnro</span>
    <br>
	<input type="number" name="data[postinro]" value="<?php echo $lomakedata['postinro']; ?>" postinro><span>*postinro</span>
    <br>
	<input type="text" name="data[kaupunki]" value="<?php echo $lomakedata['kaupunki']; ?>" kaupunki><span>*kaupunki</span>
    <br>
	<input type="text" name="data[osoite]" value="<?php echo $lomakedata['osoite']; ?>" osoite><span>*osoite</span>
    <br>
    <?php
	else: 
	?>
	<input type="text" name="data[username]" placeholder="Username" username><span>*username</span>
    <br>
	<input type="text" name="data[enimi]" placeholder="Surname" enimi><span>*enimi</span>
    <br>
	<input type="text" name="data[snimi]" placeholder="Lastname" snimi><span>*snimi</span>
    <br>
	<input type="email" name="data[email]" placeholder="Email" email><span>*email</span>
    <br>
	<input type="tel" name="data[puhnro]" placeholder="Phone number" puhnro><span>*puhnro</span>
    <br>
	<input type="number" name="data[postinro]" placeholder="Postal code" postinro><span>*postinro</span>
    <br>
	<input type="text" name="data[kaupunki]" placeholder="City" kaupunki><span>*kaupunki</span>
    <br>
	<input type="text" name="data[osoite]" placeholder="Address" osoite><span>*osoite</span>
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