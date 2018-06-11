<!DOCTYPE html>
<html>
    <head>
        
        <title>Ghoster - Login</title>
        
        
        
    </head>
    
    <body>
      


<?php

 require_once '../config/config.init.php';
 
 
 session_start();
 if(isset($_SESSION["userid"])) 
   {   
       
   die('Du bist bereits eingeloggt. <br>Weiter zur <a href="/index.php">Ghoster</a> <meta http-equiv="refresh" content="1; URL=index.php">');
   } else {
 
  if(isset($_POST['login'])) {
        $nickname = $_POST['nickname'];
        $passwort = $_POST['password'];

        $statement = $pdo->prepare("SELECT * FROM gusers WHERE username = :nickname");
        $result = $statement->execute(array('nickname' => $nickname));
        $user = $statement->fetch();
        //Überprüfung des Passworts
		
        if ($user !== false && password_verify($passwort, $user['password']) ) {
                $_SESSION['userid'] = $user['id'];
				$_SESSION['nick'] = $user['username'];
                die('<div class="col-md-12 text-center erfolgmsg">Login erfolgreich. <br>Weiter zur <a href="musiccloud/index.php">Musiccloud</a> <meta http-equiv="refresh" content="1; URL=../musiccloud/index.php"></div>');
        } else {
                echo  '<div class="col-md-12 text-center errormsg"><b>Nickname oder Passwort ist ung&uuml;ltig oder du wurdest Gesperrt</b>';
        }
		
  }
   }

        
        
        
        /* 
       * Login Form
       * Name und passwort werden
       * hier gesendet
       */
  ?>      
        
        <form method="POST" action="<?php echo($_SERVER['PHP_SELF']); ?>"> 
            <h1>Nickname :</h1>
            <input type="text" name="nickname" value="" size="100" /><br>
            <h2>Passwort :</h2>
            <input type="password" name="password" value="" size="100" /><br>
            <input type="submit" name="login" value="Anmelden"/><br>
        </form>
        
    </body>
    
    
    
</html>


