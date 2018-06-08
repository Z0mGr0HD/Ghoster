<!DOCTYPE html>
<html>
    <head>
        
        <title>Ghoster - Login</title>
        
        
        
    </head>
    
    <body>
      


<?php
session_start();
 include_once '../Configs/config.init.php';
 
 if(isset($_SESSION["userid"])) 
   {   
       
   die('Du bist bereits eingeloggt. <br>Weiter zur <a href="/index.php">Ghoster</a> <meta http-equiv="refresh" content="1; URL=index.php">');
   } else {
 
  if(isset($_GET['login'])) {
      
     $nickname = $_POST['nickname'];
     $passwort = $_POST['passwort']; 
     
        $statement = $pdo->prepare("SELECT * FROM benutzerdaten WHERE Nickname = :nickname");
        $result = $statement->execute(array('nickname' => $nickname));
        $user = $statement->fetch();
        
       if ($user !== false && password_verify($passwort, $user['Kennwort']) ) {
         $_SESSION['userid'] = $user['id'];
         $_SESSION['nick'] = $user['nickname'];
         die('Login erfolgreich. <br>Weiter zur <a href="/index.php">Ghoster</a> <meta http-equiv="refresh" content="1; URL=../index.php">');
        } else {
                echo '<b>Nickname oder Passwort ist ung&uuml;ltig</b>';
        }
        
        
  }

        
        
        
        /* 
       * Login Form
       * Name und passwort werden
       * hier gesendet
       */
  ?>      
        
        <form method="POST" action="?login=1"> 
        <input type="text" name="Nickname" value="" size="100" />
        <input type="password" name="Passwort" value="" size="100" />
        <input type="submit" value="Einloggen" name="Login" />
        </form>
        
    </body>
    
    
    
</html>


