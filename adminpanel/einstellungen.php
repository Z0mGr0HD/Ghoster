<!DOYTYPE html>
<html>
 <head>
		<!-- Eigenes Stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/einstellungen.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
		<!-- Einladungscode anzeigen --> 
	<title>Ghoster | Adminpanel</title>
		<!-- Bootstrap Anfang -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- Bootstrap Ende // CSS ?berschreiben: command:value !important" // -->
</head>		
<?php
	
$showseite = false;
		
session_start();
				require '../config/config.init.php';
		$admin = "SELECT * FROM gusers WHERE rang = 'admin'";
		$result = $pdo->query($admin);
  $row = $result->fetch();
 if(!isset($_SESSION['userid'])) {
 echo('Bitte erst <a href="/index.php">anmelden</a>');
 } elseif($row['rang'] == "admin") { 
  $showseite = true;
 } else{
  die('Du bist kein Admin <a href="/index.php"><br>Zurueck zur Startseite! </a');
  }
	

$showformular = true;
if($showformular) {
?>
<body>
	<nav class="navbar navbar-default grey" role="navigation">
	  <div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		</button>    
	  </div>
	  <a class="navbar-brand red hidden-xs hidden-sm" href="#">Adminpanel</a>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-left">
				<li><a href="index.php">Home</a></li>
			</ul>
				<ul class="nav navbar-nav">
				<li><a href="benutzer.php">Benutzer</a></li>
				<li class="active"><a href="einstellungen.php">Einstellungen</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<li><a href="/logout/logout.php">Abmelden</a></li>
			</ul>
		</div>
	</nav>
	<!-- Header Ende -->
	<?php	
}
?>

	<?php
	include "footer.php";
	?> 
	<!-- Bootstrap Anfang [Immer an Schluss] -->
    <!-- jQuery (wird f?r Bootstrap JavaScript-Plugins ben?tigt) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Binde alle kompilierten Plugins zusammen ein (wie hier unten) oder such dir einzelne Dateien nach Bedarf aus -->
    <script src="../js/bootstrap.min.js"></script>
	<!-- Bootstrap Ende -->
</body>
</html>