
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
		?>

		<?php
		  require_once 'styles/files/bootstrap-top.php';
		require_once 'login/login.php';
		if($loggedin) {
		  $info = 'Du bist bereits angemeldet.';
		}else{
			$info = "Du bist nicht eingeloggt!";
		}

            
          
		      require_once 'styles/theme1/index.php';



		    require_once 'logout/logout.php';
		    require_once 'register/register.php';

            require_once 'config/config.init.php';

           $startsite = true;
           if($loggedin) {
        
               
				echo '<meta http-equiv="refresh" content="2; URL=http://www.playvode.de/dashboard/">';

		  } 
		              require_once 'styles/files/bootstrap-bottom.php';?>
    </body>
</html>
