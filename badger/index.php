<?php
require_once("config/config.php");
require_once("functions/functions.php");
session_set_cookie_params(0, SITE_ROOT);
session_start();
SSLon();

include("includes/iheader.php");
include("includes/inavMerc.php");
include("includes/iproduct.php");
include("includes/ifooter.php");

?>