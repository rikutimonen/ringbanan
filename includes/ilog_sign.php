
	<div class="loginframe">
		<div class="user-login">
			Kirjaudu sisaan.
			<form action="<?php echo SITE_ROOT?>login" method="post">
				<label>Sahkoposti:&nbsp;</label>
				<input type="text" name="email">
				<br>
				<label>Salasana:&nbsp;</label>
				<input type="password" name="pwd">
				<br>
				<input type="submit" value="Kirjaudu" class="button sininen">
			</form>
		</div>
		
		<div class="user-sign">
			Eiko sinulla ole viela tunnuksia?
			<br>
			<a href="<?php echo SITE_ROOT?>register" class="button sininen">Rekisteröidy.</a>
		</div>
	</div>
