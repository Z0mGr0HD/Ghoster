<!DOCTYPE html>
<html>
  <head>
	<title>Ghoster | Registrierung</title>
	
</head>
<body>

	<?php 
	session_start();
	$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
        include_once '/Configs/config.init.php';
	if(isset($_GET['register'])) {
	$error = false;
	$email = $_POST['Email'];
        $email2 = $_POST['Email2'];      
	$passwort = $_POST['Passwort'];
	$passwort2 = $_POST['Passwort2'];
	$nickname = $_POST['Nickname'];
	$vorname = $_POST['Vorname'];
        $Nachnahme = $_POST['Nachnahme'];
	$ipadresse = $_SERVER['REMOTE_ADDR'];
        $gebdate = $_POST['gebdatum'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo '<b>Bitte eine g&#252;ltige E-Mail-Adresse eingeben</b><br>';
		$error = true;
	}
	if(strlen($passwort) == 0) {
		echo '<b>Bitte ein Passwort angeben</b><br>';
		$error = true;
	}
		if(strlen($passwort2) == 0) {
		echo '<b>Bitte ein Passwort Wiederholen</b><br>';
		$error = true;
	}
	if($passwort != $passwort2) {
		echo '<b>Die Passwörter müssen übereinstimmen</b><br>';
		$error = true;
	}
        if($email != $email2) {
            echo '<b>Die Email muss übereinstimmen</b>';
            $error = true;
        }
	if(strlen($nickname) == 0) {
		echo '<b>Bitte ein Nickname angeben</b><br>';
		$error = true;
	}
			
	if(strlen($vorname) == 0) {
		echo '<b>Bitte ein Vorname angeben</b><br>';
		$error = true;
	}
			
	

	//Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
	if(!$error) { 
		$statement = $pdo->prepare("SELECT * FROM benutzerdaten WHERE email = :email");
		$result = $statement->execute(array('email' => $email));
		$user = $statement->fetch();
		
		if($user !== false) {
			echo '<b>Diese E-Mail-Adresse ist bereits vergeben</b><br>';
			$error = true;
		}	
	}
	
		   //Überprüfe, dass der Nickname noch nicht registriert wurde
	if(!$error) { 
		$statement = $pdo->prepare("SELECT * FROM users WHERE Nickname = :nickname");
		$result = $statement->execute(array('nickname' => $nickname));
		$nick = $statement->fetch();
		
		if($nick !== false) {
			echo '<b>Dieser Nickname ist bereits vergeben</b><br>';
			$error = true;
		}	
	} 
	
	//Keine Fehler, wir können den Nutzer registrieren
	if(!$error) {	
		$passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
		
		$statement = $pdo->prepare("INSERT INTO users (email, Kennwort, Vorname, Nachnahme, Nickname, GebDatum, ip) VALUES (:email, :Kennwort, :Vorname, :Nachnahme, :Nickname, :GebDatum, :ip)");
		$result = $statement->execute(array('email' => $email, 'Kennwort' => $passwort_hash, 'Vorname' => $vorname, 'Nachnahme' => $Nachnahme, 'Nickname' => $nickname, 'GebDatum' => $gebdate, 'ip' => $ipadresse));
		
		if($result) {		
			echo 'Du wurdest erfolgreich registriert. <br><a href="/index.php">Zum Login</a> <meta http-equiv="refresh" content="2; URL=/index.php">';
			$showFormular = false;
		} else {
			echo '<b>Beim Abspeichern ist leider ein Fehler aufgetreten.</b><br>';
		}
	} 
	} 
 
	if($showFormular) {
	?>
    <form method="POST" action="?register=1">
	     <h>Nickname</h><br>
        <input type="text" name="Nickname" value="" size="100" /><br>
		<h>E-Mail-Adresse</h><br>
        <input type="text" name="Email" value="" size="100" /><br>
		<h>E-Mail-Adresse Wiederholen</h><br>
        <input type="text" name="Email2" value="" size="100" /><br>
		<h>Passwort </h><br>
        <input type="password" name="Passwort" value="" size="100" /><br>
		<h>Passwort Wiederholen</h><br>
        <input type="password" name="Passwort2" value="" size="100" /><br>
		<h>Vorname</h><br>
        <input type="text" name="Vorname" value="" size="100" /><br>
		<h>Nachnahme</h><br>
        <input type="text" name="Nachname" value="" size="100" /><br>
		<h>Geburtstags datum</h><br>
        <input type="date" id="gebdatum" size="100"><br>
		<button type="submit" name="login">Registrieren</button>
    </form>

<?php
} //Ende von if($showFormular)
?>

	</body>
</html>

