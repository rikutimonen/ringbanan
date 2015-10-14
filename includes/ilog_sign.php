
	<div class="loginframe">
		<div class="user-login">
			Log in:
			<form action="<?php echo SITE_ROOT?>login" method="post">
				<label>Email:&nbsp;</label>
				<input type="text" name="email">
				<br>
				<label>Password:&nbsp;</label>
				<input type="password" name="pwd">
				<br>
				<input type="submit" value="Log in" class="button sininen">
			</form>
		</div>

		<div class="user-sign">
			Not registered yet?
			<br>
			<a href="<?php echo SITE_ROOT?>register" class="button sininen">Register.</a>
		</div>
	</div>
