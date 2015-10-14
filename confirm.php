<div class="tuotesivu">
      <h2>Do you want to order these products?</h2>
      <?php //Päivitä kori
            require_once('model/mupdateCart.php');
            //Näytä kori
            require_once('model/mshowCart.php');
      ?>
      

    <section class="rekist">
    <h3>Confirm your information</h3>
<?php if($_SESSION['kirjautunut'] == 'jep'){
	$data = $_POST['data'];
	$_SESSION['lomakedata'] = serialize($data);
	
    echo '<div class="tiedot">';
	echo 'Name: '.$_SESSION['enimi'].' '.$_SESSION['snimi'];
	echo '<br>';
	echo 'Email: '.$_SESSION['email'].', Telephone: '.$_SESSION['puhnro'];
	echo '<br>';
	echo 'Address: '.$_SESSION['osoite'].' '.$_SESSION['postinro'].' '.$_SESSION['kaupunki'];
	echo '</div>';
?>
	<div class="orderbuttons">
          <a href="javascript:window.history.back();" class="button punainen">&larr; Back</a>
          <a href="tilaa" class="button punainen" id_"tilaa"> Order &rarr;</a>
      </div>
<?php } else {
	include("includes/ilog_sign.php");

}?>
</section>
</div>