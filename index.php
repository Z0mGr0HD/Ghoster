
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
	<meta charset="utf-8"> 
        <title>Ghoster - Alpha</title>
    </head>
    <body>
        <?php
		session_start();
		    require_once 'logout/logout.php';
            require_once 'login/login.php';
		    require_once 'register/register.php';
		    require_once 'styles/theme1/index.php';
            require_once 'config/config.init.php';

           $startsite = true;
           if($loggedin) {

           if($startsite) {
           
  
  

        
        
        

      echo '<div class="feed"';
                   
                   require_once 'usermanagment/profile.php';
                   $nick = $_SESSION['nick'];
				        
        

                   timeFeed($nick);
                 
     echo '</div>';
          
           }elseif ($profile) {
                require_once 'usermanagment/profile.php';
                   getProfile($nick); 
                   $nick = $_SESSION['username'];
           }
           }else {
			   $startsite = false;
		   }
        ?>
    </body>
</html>
