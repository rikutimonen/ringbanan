<?php
	//config yms
	require_once ("config/config.php");
	require_once("functions/functions.php");
	session_set_cookie_params ( 0, SITE_ROOT ); // Cookie voimassa kunnes selain suljetaan
	session_start();

	//Navigaatio, joka näkyy jokaisella sivulla
	include("includes/iheader.php");

		//UUTISET
	if ($_GET['osio'] == uutiset){
		if (isset($_GET['uutisid']) && empty($_GET['toiminto'])) {
			include("view/vuutinen.php");
		}
		elseif ($_GET['uutisid'] == uusi_artikkeli && $_GET['toiminto'] == luo) {
			include("view/vuutisLuonti.php");
		}
		else {
			include("view/vuutiset.php");
		}
	}

	//MEDIA
	else if ($_GET['osio'] == mediat) {
		include("media.php");
	}

	//MERCHANDISE
	else if ($_GET['osio'] == merchandise) {
		include("includes/iproduct.php");
	}
		//DISCUSSION
	else if ($_GET['osio'] == discussion) {
		//nclude("media.php");
	}

	//// 	 REKISTERÖINTI 		 /////
	else if ($_GET['osio'] == register) {
		require_once('view/vrekisteroi.php');
	}
	////  REKISTERÖINNIN VAHVISTUS  /////
	else if ($_GET['osio'] == vahvistarek) {
		require_once('view/vvahvista.php');
	}
	////  TALLENNA REKISTERÖINTI	/////
	else if ($_GET['osio'] == tallennakayttaja) {
		require_once('save_user.php');
	}

	////  LOGIN	/////
	else if ($_GET['osio'] == login) {
		require_once('login.php');
	}

	//Heitä pääsivulle jos mikätahansa muu pääte sivulla
	else {

		include("includes/ibanner.php");
		include("view/audioplayer.php");
		include("view/paasivu.php");
	}
	// FOOTER aina pohjalla
	include("view/footer.php");
?>
		</div>
	<!---- javascript lataus ---->
	<script src="<?php echo SITE_ROOT; ?>assets/js/app.js"></script>
	</body>
</html>
