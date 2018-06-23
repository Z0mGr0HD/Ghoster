<!DOCTYPE html>
<html>
    <head>
        
        <title>Ghoster - Login</title>
        
        
        
    </head>
    
    <body>
      


<?php

 require_once 'config/config.init.php';
 
 if(isset($_SESSION["userid"])) 
   {   
       $loggedin = true;
   }else {
	   $loggedin = false;
   }
 
  if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $passwort = $_POST['password'];

        $statement = $pdo->prepare("SELECT * FROM gusers WHERE username = :username");
        $result = $statement->execute(array('username' => $username));
        $user = $statement->fetch();
        //Überprüfung des Passworts
		
        if ($user !== false && password_verify($passwort, $user['password']) ) {
                $_SESSION['userid'] = $user['id'];
				$_SESSION['username'] = $user['username'];

                die('Weiter zu <a href="dashboard/index.php">Ghoster</a> <meta http-equiv="refresh" content="0.25; URL=dashboard/index.php">');
        } else {
                $info = "Benutzername oder Passwort ist ung&uuml;ltig.";
        }
		
  }
   

        
        
        
  ?>
    
</html>


