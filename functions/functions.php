<?php
/**
 * 
 * @param unknown $user
 * @param unknown $pwd
 * @param unknown $DBH
 * @return found boolean false jos annettua käyttäjää ja salasanaa löydy
 */
function login($user, $pwd, $DBH) {
	// !! on suola, jotta kantaan taltioitu eri hashkoodi vaikka salasana olisi tiedossa
	//kokeile !! ja ilman http://www.danstools.com/md5-hash-generator/
	//Tukevampia salauksia hash('sha256', $pwd ) tai hash('sha512', $pwd )
	//MD5 on 128 bittinen
	$hashpwd = hash('md5', $pwd.'!!');
	//An array of values with as many elements as there are bound parameters in the 
	//SQL statement being executed. All values are treated as PDO::PARAM_STR
	$data = array('kayttaja' => $user, 'passu' => $hashpwd);
	//print_r($data);
	try {
		//print_r($data);
		//echo "Login 1<br />";
		$STH = $DBH->prepare("SELECT * FROM vk_asiakas WHERE email=:kayttaja AND
		pwd = :passu");
		$STH->execute($data);
		$STH->setFetchMode(PDO::FETCH_OBJ);
		$row = $STH->fetch();
		//print_r($row);
		if($STH->rowCount() > 0){
			//echo "Login 4<br />";
			return $row;
		} else {
			//echo "Login 5<br />";
			return false;
		}
	} catch(PDOException $e) {
		echo "Login DB error.";
		file_put_contents('log/DBErrors.txt', 'Login: '.$e->getMessage()."\n", FILE_APPEND);
	}
}


// haetaan katekgoriat rekursiivisesti
//Pääkategorian parent_cat_id =0

function haeKategoriat($DBH, $parent = 0, $categories = array()) {
	$haara = array();
	//Haetaan ensin pääkategoriat, seuraavaksi alempi jne niin kauan kuin löytyy
	$STH = $DBH->query("SELECT 0mrb_kategoriat.kNimi FROM 0mrb_kategoriat");
	$STH->setFetchMode(PDO::FETCH_OBJ);
	while ($category = $STH->fetch()) {
			$haara[] = $category;
		}
	
	return $haara;
}


/**
 * Hakee satunnaisen tuotteen annetusta kategoriasta
 * @param unknown $DBH
 * @param unknown $kat
 */
/*function haeRandomKuva($DBH, $kat){
	$STH = $DBH->query("SELECT * FROM vk_tuotteet JOIN vk_kategorialiitos ON vk_tuotteet.tID = vk_kategorialiitos.tuote_id WHERE vk_kategorialiitos.kategoria_id = $kat ORDER BY RAND();");
	$STH->setFetchMode(PDO::FETCH_OBJ);
	$tuote = $STH->fetch(); //Haetaan ensimmäinen annetuista satunnaisesti valituista tuotteista
	echo SITE_ROOT.'assets/img/pikkukuvat/'.$tuote->tID.'.jpg';
}


/**
 * Tulostaa yhden tuotteen tuotekuvalla (pienin). 
 * Tietokantakyselyn palauttaman rivin eli yhden tuotteen tiedot on sijoitettu olioon
 * @param  $tuote Olio joka sisältää yhden tuoteen tiedot (PDO:n tuottama)
 */
function tulostaTuote($product){
	//print_r($tuote);
?>
	<article>
	        <!-- Linkiksi teksti: kategoria/alakategoria/tuote  ... 
	        tuotenimessävälilyönnit korvattuna alaviivalla -->
	        <!-- Kuvan nimi on sama kuin tuotteen indeksi kannassa -->
	        <!-- HUOM! ÄLÄ LAITA SEURAAVAA monelle riville, tulee välilyöntejä mukaan -->
            <!-- <a href="<?php echo SITE_ROOT;?><?php echo $product->kNimi; ?>/<?php echo $product->akNimi; ?>/<?php echo str_replace(' ', '_', $product->nimi); ?>"> -->
          
    		 <img src="assets/img/pikkukuvat/<?php echo $product->tID;?>">
             <button class="koriin button punainen" data-tid="<?php echo $product->tID; ?>">
             Add to cart</button>
             
             <h2><?php echo $product->tNimi;?></h2>
             <div class="hinta">
             	<?php echo $product->tHinta;?> €
             </div>
             <p><?php echo $product->tKuvaus;?></p>
            
            </a>
     </article>
<?php
}
 
	//This works in 5.2.3
	//First function turns SSL on if it is off.
	//Second function detects if SSL is on, if it is, turns it off.
	
	/**
	 * Redirects to given url
	 * Redirect... Try PHP header redirect, then Java redirect, then try http redirect.:
	 * @param url 
	 */
	function redirect($url){
		if (!headers_sent()){    //If headers not sent yet... then do php redirect
			header('Location: '.$url); exit;
		}else{                    //If headers are sent... do java redirect... if java disabled, do html redirect.
			echo '<script type="text/javascript">';
			echo 'window.location.href="'.$url.'";';
			echo '</script>';
			echo '<noscript>';
			echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
			echo '</noscript>'; exit;
		}
	}//==== End -- Redirect
	
	/**
	
	* Turn on HTTPS - Detect if HTTPS, if not on, then turn on HTTPS:
	
	*/
	
	function SSLon() {
	
		if ($_SERVER ['HTTPS'] != 'on') {
	
			$url = "https://" . $_SERVER ['HTTP_HOST'] . $_SERVER ['REQUEST_URI'];
	
			redirect ( $url );
	
		}
	
	}
	
	
	
	/**
	
	* Turn Off HTTPS -- Detect if HTTPS, if so, then turn off HTTPS:
	
	*/
	
	function SSLoff() {
	
		if ($_SERVER ['HTTPS'] == 'on') {
	
			$url = "http://" . $_SERVER ['HTTP_HOST'] . $_SERVER ['REQUEST_URI'];
	
			redirect ( $url );
	
		}
	
	}
	

?>