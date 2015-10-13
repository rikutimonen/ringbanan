<footer class = "dark-gray">
	<p>
	contact: mrbadger@badger.com
	<?php 
	if ($_SESSION['kirjautunut']){
		echo('<br> Logged in as ' . $_SESSION['username']);
	}
	if ($_SESSION['taso'] > 2) {
		echo('<br>Admin level: ');
		print_r($_SESSION['taso']);
		echo('<br>');
		print_r($_SESSION['email']);
	}
	/*print_r($_SESSION['username']);
	print_r($_SESSION['taso']);
	print_r($_SESSION['kirjautunut']);*/
	?>
	</p>
</footer>
