<footer class = "dark-gray">
	<p>
	Contact: mrbadger@badger.com
	<?php
	if ($_SESSION['kirjautunut']){
		echo('<br> Logged in as ' . $_SESSION['username']);
	}
	if ($_SESSION['taso'] > 2) {
		echo('<br>User level: ');
		echo($_SESSION['taso'] . ' (Admin)');
		echo('<br>');
		echo($_SESSION['email']);
	}
	/*print_r($_SESSION['username']);
	print_r($_SESSION['taso']);
	print_r($_SESSION['kirjautunut']);*/
	?>
	</p>
</footer>
