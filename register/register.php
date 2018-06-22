<!DOCTYPE html>
<html>
  <head>
	<title>Ghoster | Registrierung</title>

</head>
<body>

	<?php
	require_once 'config/config.init.php';
	session_start();
	$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
        
	if(isset($_POST['register'])) {
	$error = false;
	$email = $_POST['email'];
        $email2 = $_POST['email2'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$username = $_POST['username'];
	$firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
	$ip = $_SERVER['REMOTE_ADDR'];
	$bday = $_POST['bday'];
#	$bmonth = $_POST['bmonth'];
#	$byear = $_POST['byear'];
#    $birthday = $bday. "/" .$bmonth. "/" .$byear;

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo '<b>Bitte eine g&#252;ltige E-Mail-Adresse eingeben</b><br>';
		$error = true;
	}
	if(strlen($password) == 0) {
		echo '<b>Bitte ein Passwort angeben</b><br>';
		$error = true;
	}
		if(strlen($password2) == 0) {
		echo '<b>Bitte ein Passwort Wiederholen</b><br>';
		$error = true;
	}
	if($password != $password2) {
            echo '<b>Die Passwörter müssen übereinstimmen</b><br>';
		$error = true;
	}
        if($email != $email2) {
            echo '<b>Die Email muss übereinstimmen</b>';
            $error = true;
        }
	if(strlen($username) == 0) {
		echo '<b>Bitte ein Username angeben</b><br>';
		$error = true;
	}

	if(strlen($firstname) == 0) {
		echo '<b>Bitte ein Vorname angeben</b><br>';
		$error = true;
	}



	//Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
	if(!$error) {
		$statement = $pdo->prepare("SELECT * FROM gusers WHERE email = :email");
		$result = $statement->execute(array('email' => $email));
		$user = $statement->fetch();

		if($user !== false) {
			echo '<b>Diese E-Mail-Adresse ist bereits vergeben</b><br>';
			$error = true;
		}
	}

		   //Überprüfe, dass der Nickname noch nicht registriert wurde
	if(!$error) {
		$statement = $pdo->prepare("SELECT * FROM gusers WHERE username = :username");
		$result = $statement->execute(array('username' => $username));
		$nick = $statement->fetch();

		if($nick !== false) {
			echo '<b>Dieser Username ist bereits vergeben</b><br>';
			$error = true;
		}
	}

	//Keine Fehler, wir können den Nutzer registrieren
	if(!$error) {
		$passwort_hash = password_hash($password, PASSWORD_DEFAULT);

		$statement = $pdo->prepare("INSERT INTO gusers (email, password, firstname, lastname, username, birthday, ip) VALUES (:email, :password, :firstname, :lastname, :username, :birthday, :ip)");
		$result = $statement->execute(array('email' => $email, 'password' => $passwort_hash, 'firstname' => $firstname, 'lastname' => $lastname, 'username' => $username, 'birthday' => $bday, 'ip' => $ip));

		if($result) {
			echo 'Du wurdest erfolgreich registriert. <br><a href="/index.php">Zum Login</a> <meta http-equiv="refresh" content="2; URL=/index.php">';
			$showFormular = false;
		} else {
			echo '<b>Beim Abspeichern ist leider ein Fehler aufgetreten.</b><br>';
		}
	}
	}

?>

	</body>
</html>

