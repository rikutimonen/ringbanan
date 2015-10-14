<?php
@include_once('../config/config.php');
session_set_cookie_params (0, SITE_ROOT); 
session_start();
//Poistetaan sessiomuuttujan elementti (taulukko) 'cart', 
//joka sisältää ostettujen tuotteiden id:t
unset($_SESSION['cart']);
?>