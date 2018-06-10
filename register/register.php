<!DOCTYPE html>
<html>
  <head>
	<title>Ghoster | Registrierung</title>

</head>
<body>

	<?php
	session_start();
	$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
        include_once '/config/config.init.php';
	if(isset($_GET['register'])) {
	$error = false;
	$email = $_POST['email'];
        $email2 = $_POST['email2'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$username = $_POST['username'];
	$firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
	$ip = $_SERVER['REMOTE_ADDR'];
    $birthday = $_POST['birthday'];

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
		$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
		$result = $statement->execute(array('email' => $email));
		$user = $statement->fetch();

		if($user !== false) {
			echo '<b>Diese E-Mail-Adresse ist bereits vergeben</b><br>';
			$error = true;
		}
	}

		   //Überprüfe, dass der Nickname noch nicht registriert wurde
	if(!$error) {
		$statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
		$result = $statement->execute(array('username' => $username));
		$nick = $statement->fetch();

		if($nick !== false) {
			echo '<b>Dieser Username ist bereits vergeben</b><br>';
			$error = true;
		}
	}

	//Keine Fehler, wir können den Nutzer registrieren
	if(!$error) {
		$passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);

		$statement = $pdo->prepare("INSERT INTO users (email, password, firstname, lastname, username, birthday, ip) VALUES (:email, :password, :firstname, :lastname, :username, :birthday, :ip)");
		$result = $statement->execute(array('email' => $email, 'password' => $passwort_hash, 'firstname' => $firstname, 'lastname' => $lastname, 'username' => $username, 'birthday' => $birthday, 'ip' => $ip));

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
	     <h>Username</h><br>
        <input type="text" name="username" value="" size="100" /><br>
		<h>E-Mail-Adresse</h><br>
        <input type="text" name="email" value="" size="100" /><br>
		<h>E-Mail-Adresse Wiederholen</h><br>
        <input type="text" name="email2" value="" size="100" /><br>
		<h>Passwort </h><br>
        <input type="password" name="password" value="" size="100" /><br>
		<h>Passwort Wiederholen</h><br>
        <input type="password" name="password2" value="" size="100" /><br>
		<h>Vorname</h><br>
        <input type="text" name="firstname" value="" size="100" /><br>
		<h>Nachnahme</h><br>
        <input type="text" name="lastname" value="" size="100" /><br>
		<h>Geburtstags datum</h><br>
        <input type="date" id="birthday" size="100"><br>
		<button type="submit" name="login">Registrieren</button>
    </form>

<?php
} //Ende von if($showFormular)
?>

	</body>
</html>

