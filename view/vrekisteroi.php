<div class="tuotesivu">
    <section class="rekist">
    <h3>Registration</h3>
    <p>Marked fields are required.</p>
<form action="vahvistarek" method="post">
	<?php
    if(isset($_SESSION['lomakedata'])):
		$lomakedata = unserialize($_SESSION['lomakedata']);
	?>
	<input type="text" name="data[username]" value="<?php echo $lomakedata['username']; ?>" required><span>* Username</span>
    <br>
	<input type="text" name="data[enimi]" value="<?php echo $lomakedata['enimi']; ?>"><span>Forename</span>
    <br>
	<input type="text" name="data[snimi]" value="<?php echo $lomakedata['snimi']; ?>"><span>Surname</span>
    <br>
	<input type="email" name="data[email]" value="<?php echo $lomakedata['email']; ?>" required><span>* Email</span>
    <br>
	<input type="tel" name="data[puhnro]" value="<?php echo $lomakedata['puhnro']; ?>"><span>Phone number</span>
    <br>
	<input type="number" name="data[postinro]" value="<?php echo $lomakedata['postinro']; ?>"><span>Postal code</span>
    <br>
	<input type="text" name="data[kaupunki]" value="<?php echo $lomakedata['kaupunki']; ?>"><span>City</span>
    <br>
	<input type="text" name="data[osoite]" value="<?php echo $lomakedata['osoite']; ?>"><span>Address</span>
    <br>
    <?php
	else:
	?>
	<input type="text" name="data[username]" placeholder="Username" username><span>* Username</span>
    <br>
	<input type="text" name="data[enimi]" placeholder="Forename" enimi><span>* Forename</span>
    <br>
	<input type="text" name="data[snimi]" placeholder="Surname" snimi><span>* Surname</span>
    <br>
	<input type="email" name="data[email]" placeholder="Email" email><span>* Email</span>
    <br>
	<input type="tel" name="data[puhnro]" placeholder="Phone number" puhnro><span>* Phone number</span>
    <br>
	<input type="number" name="data[postinro]" placeholder="Postal code" postinro><span>* Postal code</span>
    <br>
	<input type="text" name="data[kaupunki]" placeholder="City" kaupunki><span>* City</span>
    <br>
	<input type="text" name="data[osoite]" placeholder="Address" osoite><span>* Address</span>
    <br>
    <?php
	endif;
	?>
	<br>
    <input type="password" name="data[pwd]" placeholder="Password" required><span>* Password</span>
    <br>
    <input type="submit" value="Tallenna">
</form>
</section>
</div>
