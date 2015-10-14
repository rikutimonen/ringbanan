<div class="tuotesivu">
    <section class="rekist">
    <h3>Vahvista tiedot</h3>
<?php
	$data = $_POST['data'];
	$_SESSION['lomakedata'] = serialize($data);
	
    echo '<div class="tiedot">';
	echo 'Username: '.$data['username'];
	echo '<br>';
	echo 'Email: '.$data['email'].', Phone: '.$data['puhnro'];
	echo '<br>';
	echo 'Osoite: '.$data['osoite'].' '.$data['postinro'].' '.$data['kaupunki'];
	echo '</div>';
	echo '<a href="'.SITE_ROOT.'/tallennakayttaja" class="button sininen">Tallenna</a>';
	echo '<br>';
	echo '<a href="'.SITE_ROOT.'/register" class="button punainen">Takaisin</a>';
?>
	
	</section>
</div>