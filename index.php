<?php
	//config yms
	require_once ("config/config.php");
	require_once("functions/functions.php");
	session_set_cookie_params ( 0, SITE_ROOT ); // Cookie voimassa kunnes selain suljetaan

	//Tämä korjaa htaccesin rikkoamat jutskat, jos lisää ennen jokaista session_startia.
	//Vaihtoehtoisesti htaccesin addhandler-rivi veks
	//session_save_path("/home1-3/k/kaif/public_html/ringbanan"); <---------------------------
	session_start();

	//Navigaatio, joka näkyy jokaisella sivulla
	include("includes/iheader.php");

		//UUTISET
	if ($_GET['osio'] == uutiset){
		include("includes/icontainer.php");
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
		//include("media.php");
		include("includes/icontainer.php");
		include("view/vmedia.php");
	}
	

	//MERCHANDISE
	else if ($_GET['osio'] == merchandise) {
		include("includes/icontainer.php");
		include("createProduct.php");
		include("includes/iproduct.php");
	}

	else if ($_GET['osio'] == Apparel) {
		include("includes/icontainer.php");
		include("createProduct.php");
		include("includes/iproductSort1.php");
	}

	else if ($_GET['osio'] == Accessories) {
		include("includes/icontainer.php");
		include("createProduct.php");
		include("includes/iproductSort2.php");
	}

	else if ($_GET['osio'] == Misc) {
		include("includes/icontainer.php");
		include("createProduct.php");
		include("includes/iproductSort3.php");
	}

		//DISCUSSION
	else if ($_GET['osio'] == discussion) {
		//nclude("media.php");
	}

	//// 	 REKISTERÖINTI 		 /////
	else if ($_GET['osio'] == register) {
		include("includes/icontainer.php");
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
	
	////  LOGOUT	/////
	else if ($_GET['osio'] == logout) {
		require_once('logout.php');
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

