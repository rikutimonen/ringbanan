<?php
require_once("config/config.php");
session_set_cookie_params(0, SITE_ROOT);
session_start();

if (isset($_GET['uutisid'])) {
   include("view/vuutinen.php");
}
else {
   include("view/vuutiset.php");
}
?>
