	<!DOYTYPE html>
<html>
 <head>
		<!-- Eigenes Stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/benutzer.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
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
<body>
<?php

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
	
		
if($showseite) {
	?>
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
				<li class="active"><a href="benutzer.php">Benutzer</a></li>
				<li><a href="einstellungen.php">Einstellungen</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<li><a href="/logout/logout.php">Abmelden</a></li>
			</ul>
		</div>
	</nav>
	<!-- IP Sperren modal --> 
	<!-- Benutzer Bearbeiten -->
	<?php
	$showFormular2 = true;
	if(isset($_POST['block'])) {
		$error2 = false;
		$id_block = $_POST['id_block'];
		$nick_block = $_POST['nickname_block'];				
	
	
	

	
	
	//Keine Fehler, wir können den Nutzer Blockieren

	if($nick_block) {
		if(!$error2) {	
		
		$result1 = $pdo->query("UPDATE gusers SET block = '1' WHERE username = '$nick_block'");
			
		if($result1) {		
			echo '<div class="text-center erfolgmsg">User wurde geblockt</div>';
			$showFormular2 = false;
		}
	}
	}
	
	

		
	
		if($id_block) {
		if(!$error2) {	
		
		$result1 = $pdo->query("UPDATE gusers SET block = '1' WHERE id = '$id_block'");
			
		if($result1) {		
			echo '<div class="text-center erfolgmsg">User wurde geblockt</div>';
			$showFormular2 = false;
		}
	} 
		
	}
	}
	
	
	
	if($showFormular2) {
	?>
	<div class="modal fade" id="ip" tabindex="-1" role="dialog" aria-labelledby="ip">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Schließen"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="ip">Benutzer blockieren</h4>
		  </div>
		  	<form action="?block=1" method="post">
		  <div class="modal-body">
			<h3 class="edit">Benutzer blockieren</h3>	
			<input type="text" id="id_block" placeholder="ID" name="id_block"></input>
		    <input type="text" id="nickname_block" placeholder="Nickname" name="nickname_block"></input>
			<button type="submit" value="change" name="block">blockieren</button>
			</form>		
			<br><br>>>>>	
		
		
		<div class="col-md-12 text-center">
					<table class="table">
		<thead>
			<tr>
			  <th> ID </th>
			  <th>Nickname</th>
			 <th>Email-Adresse</th>
			  <th>Blockiert</th> <?php // 1 Heisst Ja 0 Heisst Nein ?>
			</tr>
		</thead>
	
	<?php 	

	// Create connection
	// Check connection
	echo '<br>';
	$sql = "SELECT id, email, username, block FROM gusers WHERE block = '1'";
	$result = $pdo->query($sql);

	   if($result) {
		// output data of each row
		while($row = $result->fetch()) {
			echo "<tbody><tr><td>" . $row["id"]."</td><td>" . $row["username"]. "</td><td> " . $row["email"]. "</td><td>" . $row["block"]. "</td><td></tbody><br>";

		}
	}else{
		echo 'Es wurden keine benutzer gefunden';
	}

	?>

	</TABLE>
	</div>
			<br><<<<<<
		  </div>
	  <?php
	}
		  ?>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Schlie&beta;en</button>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Ende modal -->
	<!-- benutzer modal -->
	<div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="user">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Schließen"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="user">Benutzer erstellen ·  bearbeiten · löschen</h4>
		  </div>
		  <div class="modal-body">
	  
	<?php
	$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
 
	if(isset($_GET['register'])) {
	$error = false;
	$email = $_POST['email'];
	$passwort = $_POST['passwort'];
	$nickname = $_POST['nickname'];
	$vorname = $_POST['vorname'];
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo '<div class="col-md-12 text-center errormsg"><b>Bitte eine Email-Adresse angeben</b></div><br>';
		$error = true;
	} 	
	if(strlen($passwort) == 0) {
		echo '<div class="col-md-12 text-center errormsg"><b>Bitte ein Passwort angeben</b></div><br>';
		$error = true;
	}
	if(strlen($nickname) == 0) {
		echo '<div class="col-md-12 text-center errormsg"><b>Bitte ein Nickname angeben</b></div><br>';
		$error = true;
	}	
	if(strlen($vorname) == 0) {
		echo '<div class="col-md-12 text-center errormsg"><b>Bitte ein Vorname angeben</b></div><br>';
		$error = true;
	}
			
	

	//Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
	if(!$error) { 
		$statement = $pdo->prepare("SELECT * FROM gusers WHERE email = :email");
		$result = $statement->execute(array('email' => $email));
		$user = $statement->fetch();
		
		if($user !== false) {
			echo '<div class="col-md-12 text-center errormsg"><b>Diese E-Mail-Adresse ist bereits vergeben</b></div><br>';
			$error = true;
		}	
	}
	
		   //Überprüfe, dass der Nickname noch nicht registriert wurde
	if(!$error) { 
		$statement = $pdo->prepare("SELECT * FROM gusers WHERE username = :nickname");
		$result = $statement->execute(array('nickname' => $nickname));
		$nick = $statement->fetch();
		
		if($nick !== false) {
			echo '<div class="col-md-12 text-center errormsg"><b>Dieser Nickname ist bereits vergeben</b></div><br>';
			$error = true;
		}	
	} 
	
	//Keine Fehler, wir können den Nutzer registrieren
	if(!$error) {	
		$passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
		
		$statement = $pdo->prepare("INSERT INTO gusers (email, passwort, firstname, username) VALUES (:email, :passwort, :vorname, :nickname)");
		$result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash, 'vorname' => $vorname, 'nickname' => $nickname));
		
		if($result) {		
			echo '<div class="text-center erfolgmsg">Benutzer erfolgreich erstellt</div>';
			$showFormular = false;
		} else {
			echo '<div class="col-md-12 text-center errormsg"><b>Beim Abspeichern ist leider ein Fehler aufgetreten.</b></div><br>';
		}
	} 
	} 
 
	if($showFormular) {
	?>
	<form action="?register=1" method="post">
	<div class="col-md-12 create">
		<h3 class="edit">Benutzer erstellen</h3>	
		<input type="text" id="vorname" placeholder="Name" name="vorname"></input>
		<input type="text" id="nickname" placeholder="Nickname" name="nickname"></input>
		<input type="email" id="email" placeholder="Email" name="email"></input>
		<input type="password" id="passwort" placeholder="Passwort" name="passwort"></input>
		<button type="submit" name="registrieren">Speichern</button>
	</div>
	</form>
	<?php
} 	//Ende von if($showFormular)
	?>
	<!-- ENDE REGISTRIERUNG -->
	<?php 
	//Benutzer Bearbeiten
	$showFormular1 = true;
	if(isset($_GET['change'])) {
		$error1 = false;
		$id_change = $_POST['id_change'];
			$name_change = $_POST['name_change'];
				$email_change = $_POST['email_change'];
					$nickname_change = $_POST['nickname_change'];
						$passwort_change = $_POST['passwort_change'];
								
	
		if(!filter_var($email_change, FILTER_VALIDATE_EMAIL)) {
		echo '<div class="col-md-12 text-center errormsg"><b>Bitte eine Email-Adresse angeben</b></div><br>';
		$error1 = true;
	} 	
	if(strlen($passwort_change) == 0) {
		echo '<div class="col-md-12 text-center errormsg"><b>Bitte ein Passwort angeben</b></div><br>';
		$error1 = true;
	}
	if(strlen($nickname_change) == 0) {
		echo '<div class="col-md-12 text-center errormsg"><b>Bitte ein Nickname angeben</b></div><br>';
		$error1 = true;
	}	
	if(strlen($name_change) == 0) {
		echo '<div class="col-md-12 text-center errormsg"><b>Bitte ein Vorname angeben</b></div><br>';
		$error1 = true;
	}
	
	
		//Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
	if(!$error1) { 
		$statement = $pdo->prepare("SELECT * FROM gusers WHERE email = :email");
		$result = $statement->execute(array('email' => $email_change));
		$user = $statement->fetch();
		
		if($user !== false) {
			echo '<div class="col-md-12 text-center errormsg"><b>Diese E-Mail-Adresse ist bereits vergeben</b></div><br>';
			$error1 = true;
		}	
	}
	
		   //Überprüfe, dass der Nickname noch nicht registriert wurde
	if(!$error1) { 
		$statement = $pdo->prepare("SELECT * FROM gusers WHERE username = :nickname");
		$result = $statement->execute(array('nickname' => $nickname_change));
		$nick = $statement->fetch();
		
		if($nick !== false) {
			echo '<div class="col-md-12 text-center errormsg"><b>Dieser Nickname ist bereits vergeben</b></div><br>';
			$error1 = true;
		}	
	} 
	
	//Keine Fehler, wir können den Nutzer registrieren
	if(!$error1) {	
		$passwort_hash1 = password_hash($passwort_change, PASSWORD_DEFAULT);
		
		$result2 = $pdo->query("UPDATE gusers SET firstname = '$name_change', email = '$email_change', username = '$nickname_change' , passwort = '$passwort_hash1' WHERE id = '$id_change'");
		if($result2) {		
			echo '<div class="text-center erfolgmsg">User changed</div>';
			$showFormular = false;
		} else {
			echo '<div class="col-md-12 text-center errormsg"><b>Beim Abspeichern ist leider ein Fehler aufgetreten.</b></div><br>';
		}
	} 
	} 
	if($showFormular1) {
	?>
	
	<div class="col-md-12 edit">
	<form action="?change=1" method="post">
		<h3 class="edit">Benutzer ändern</h3>	
	
		<input type="text" id="id_change" placeholder="ID" name="id_change"></input>
		<input type="text" id="nickname_change" placeholder="Nickname" name="nickname_change"></input>
		<input type="text" id="name_change" placeholder="Name" name="name_change"></input>
		
		<input type="email" id="email_change" placeholder="Email" name="email_change"></input>
		<input type="password" id="passwort_change" placeholder="Passwort change" name="passwort_change"></input>
		<button type="submit" value="change" name="change">speichern</button>
	</div>
	</form>
	<?php
	}
	?>
		<?php 
	//Benutzer Löschen
	$showFormular3 = true;
	if(isset($_GET['delete'])) {
		$error3 = false;
		$id_delete = $_POST['id_delete'];

			
								
	if(strlen($id_delete) == 0) {
		echo '<div class="col-md-12 text-center errormsg"><b>Bitte eine ID angeben</b></div><br>';
		$error3 = true;
	}	


	
	//Keine Fehler, wir können den Nutzer löschen
	if(!$error3) {	

		
		$result = $pdo->query("DELETE FROM users WHERE id = '$id_delete'");
		if($result) {		
			echo '<div class="text-center erfolgmsg">User Deleted</div>';
			$showFormular = false;
		} else {
			echo '<div class="col-md-12 text-center errormsg"><b>Beim Abspeichern ist leider ein Fehler aufgetreten.</b></div><br>';
		}
	} 
	} 
	if($showFormular3) {
	?>
	
	<div class="col-md-12 delete">
		<h3 class="delete">Benutzer löschen</h3>	
		<form action="?delete=1" method="post">
		<input type="text" id="id_delete" placeholder="ID" name="id_delete"></input>
		<button type="submit" value="delete" name="delete">Delete</button>
		</form>
	</div>
	<?php
	}
	?>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Schlie&beta;en</button>
		  </div>
		</div>
	  </div>
	</div>
	<!-- ende modal -->
	<div class="users">
		<h2 class="text-center">Benutzerliste</h2>
		<div class="col-md-12 text-center">
			<button type="button" class="btn" data-toggle="modal" data-target="#ip" data-whatever="@ip">Benutzer blockieren</button>|
			<button type="button" class="btn" data-toggle="modal" data-target="#user" data-whatever="@user">Benutzer erstellen ·  bearbeiten · löschen</button>
		</div>
		<table class="table">
		<thead>
			<tr>
			  <th>ID</th>
			  <th>Bild</th>
			  <th>Name</th>
			  <th>Lastname</th>
			  <th>Nickname</th>
			  <th>Email</th>
			  <th>Rang</th>
			  <th>IP Adresse</th>
			</tr>
		</thead>
	</div>
	<?php 	


	// Create connection
	// Check connection
	echo '<br>';
	$sql = "SELECT * FROM gusers";
	$result = $pdo->query($sql);

	if ($result) {
		// output data of each row
		while($row = $result->fetch()) {
			echo "<tbody><tr><td>" . $row["id"]."</td><td>" . "<img width='40' heigth='40' src=/uploads/".$row['picture']."> </td><td>" . $row["firstname"]. "</td><td> " . $row["lastname"]. "</td><td> " . $row["username"]. "</td><td> " . $row["email"]. "</td><td>" . $row["rang"]. "</td><td>" . $row["ip"]. "</td></tr></tbody><br>";
		}
	} else {
		echo "0 results";
	}
	$pdo->close();
	?>
	</table>
	</div>
<?php
 }
 ?>
	<?php
	include 'footer.php';
	?>
	<!-- Bootstrap Anfang [Immer an Schluss] -->
    <!-- jQuery (wird f?r Bootstrap JavaScript-Plugins ben?tigt) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Binde alle kompilierten Plugins zusammen ein (wie hier unten) oder such dir einzelne Dateien nach Bedarf aus -->
    <script src="../js/bootstrap.min.js"></script>
	<!-- Bootstrap Ende -->
	</body>
</html>