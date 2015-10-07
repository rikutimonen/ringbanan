<?php
	//config yms
	require_once ("config/config.php");
	require_once("functions/functions.php");
	session_set_cookie_params ( 0, SITE_ROOT ); // Cookie voimassa kunnes selain suljetaan
	session_start();

	//Navigaatio, joka näkyy jokaisella sivulla
	include("includes/iheader.php");
	
	//Vaihtuva banneri, joka näkyy vain etusivulla
	
	
	if ( $_GET ['osio'] == uutiset){
		//UUTISET
		if (isset($_GET['uutisid'])) {
			include("view/vuutinen.php");
			}
		else {
			   include("view/vuutiset.php");
			}
	}
	else if ($_GET['osio'] == mediat) {
		//MEDIA
		include("media.php");
	}
	else if ($_GET['osio'] == merchandise) {
		//MERCHANDISE
		include("includes/iproduct.php");
	}
	else if ($_GET['osio'] == discussion) {
		//DISCUSSION
		//nclude("media.php");
	}
	else {
		//mainpage
		include("includes/ibanner.php");
		include("view/audioplayer.php");
		include("view/paasivu.php");
		
	}
	include("view/footer.php");
?>
	</body>
</html>
			
				
			
			
