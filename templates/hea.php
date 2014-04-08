
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<meta name="HandheldFriendly" content="true" />

<title>mixart</title>

<link rel="shortcut icon" href="favicon.png"/>	

<link rel="stylesheet" type="text/css" href="styles/home.css"/>
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>

<script type='text/javascript' src='scripts/jquery.min.js'></script>

</head>

<body>
<div class="container">	
	<div class="toColBar"></div>
	<div class="hea">
		<h2 class="logo landAnim">Mixart</h2>
		<?php
		if(!empty($session["iduser"]))
		{
		?>
		<div>
			<span>Welcome, <?php echo $user->getName(); ?></span>
			<a href="admin.php">Admin</a>
			<a href="functions/logout.php">Get out</a>
		</div>
		<?php
		}
		?>
		
		<div class="menuWrap landAnim">
			<div class="menu">
				<span class="itmBg"></span>
				<a href="index.php" class="itm  <?php echo basename($_SERVER['PHP_SELF']) === 'index.php' ? "active" : "" ; ?> cont1i" data-color="#FCFCFC" data-sec="1">Info</a>
				<a href="projects.php" class="itm <?php echo basename($_SERVER['PHP_SELF']) === 'projects.php' ? "active" : "" ; ?> cont2i" data-color="#0ac2d2" data-sec="2">Projects</a>
				<a href="team.php" class="itm  cont3i" data-color="#60d7a9" data-sec="3">Team</a>
				<a href="contact.php" class="itm <?php echo basename($_SERVER['PHP_SELF']) === 'contact.php' ? "active" : "" ; ?> cont4i" data-color="#fdc162" data-sec="4">Contact</a>
			</div>
		</div>
	</div>	