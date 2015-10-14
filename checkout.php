<?php
require_once('config/config.php');
session_set_cookie_params (0, SITE_ROOT); 
session_start();
require_once('functions/functions.php');
require_once('includes/iheader.php');
SSLon();
require_once('confirm.php');
?>