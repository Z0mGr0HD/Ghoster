<!DOCTYPE html>
<html>
    <head>
        
        <title>Ghoster - Login</title>
        
        
        
    </head>
    
    <body>
      


<?php
session_start();
 include_once '../config/config.init.php';
 
 if(isset($_SESSION["userid"])) 
   {   
       
   die('Du bist bereits eingeloggt. <br>Weiter zur <a href="/index.php">Ghoster</a> <meta http-equiv="refresh" content="1; URL=index.php">');
   } else {
 
  if(isset($_GET['login'])) {
      
     $nickname = $_POST['username'];
     $passwort = $_POST['password'];
     
        $statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $result = $statement->execute(array('username' => $username));
        $user = $statement->fetch();
        
       if ($user !== false && password_verify($passwort, $user['password']) ) {
         $_SESSION['userid'] = $user['id'];
         $_SESSION['username'] = $user['username'];
         die('Login erfolgreich. <br>Weiter zur <a href="/index.php">Ghoster</a> <meta http-equiv="refresh" content="1; URL=../index.php">');
        } else {
                echo '<b>Benutzername oder Passwort ist ung&uuml;ltig</b>';
        }
        
        
  }
   }

        
        
        
        /* 
       * Login Form
       * Name und passwort werden
       * hier gesendet
       */
  ?>      
        
        <form method="POST" action="?login=1"> 
            <h1>Nickname :</h1>
            <input type="text" name="username" value="" size="100" /><br>
            <h2>Passwort :</h2>
            <input type="password" name="password" value="" size="100" /><br>
            <input type="submit" name="login" value="Anmelden"/><br>
        </form>
        
    </body>
    
    
    
</html>


