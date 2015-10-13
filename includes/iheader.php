 <!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Mr. Badger</title>
<link
	<head>
		<meta charset="utf-8">
		<title>Mr. Badger</title>
		<link rel="shortcut icon" href="favicon.ico">
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css'>
		<link href="<?php echo(SITE_ROOT);?>assets/css/fonts/foundation-icons.css" rel="stylesheet">
		<link href="<?php echo(SITE_ROOT);?>assets/css/app.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo(SITE_ROOT);?>assets/slick/slick.css">
	</head>

<body>
	<div id="sivu">
	
			<header class="main-header dark-gray">
				<nav class="top-nav">
					<ul>
						<li><a href="<?php echo(SITE_ROOT);?>">HOME</a></li>
						<li><a href="<?php echo(SITE_ROOT);?>mediat">MEDIA</a></li>
						<li><a href="<?php echo(SITE_ROOT);?>uutiset">NEWS</a></li>
						<li><a href="<?php echo(SITE_ROOT);?>merchandise">MERCHANDISE</a></li>
						<li><a href="#" id="cart-button" class="open-modal" data-target="cart-modal">OSTOSKORI</a></li>
						
						<?php if($_SESSION['kirjautunut']){
						echo('<li><a href="'.SITE_ROOT.'logout">LOG OUT</a></li>');

						}
						else{
							echo('
							<li><a href="#" id="check" class="open-modal" data-target="log-modal">login<i class="fi-check large"></i><i class="fi-torso large"></i></a></li>');
						}?>
					</ul>
				</nav>
				<div class="cart" id="cart-modal" style="opacity: 0; display: none;">
					<href="#" class="close-modal">x</a>
					<?php include("includes/iostoskori.php"); ?>
				</div>
				
				
				
				<div class="user" id="log-modal" style="opacity: 0; display: none;">
					<a href="#" class="close-modal"> X </a>
					<?php include("includes/ilog_sign.php"); ?>
					
				</div>
			</header>
		<div id="kokosivu_cont">
