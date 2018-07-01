<?php
require_once '../styles/files/bootstrap-top.php';

require_once '../usermanagment/profile.php';
session_start();
 $user = $_SESSION['username'];
require '../styles/files/navbar.php';





$profile = false;
 

echo "<a href='?profile=$user'>Profil</a>";   echo 'Nachrichten';
           if(isset($_SESSION["userid"])) 
   {   
		    if(isset($_GET['profile'])) {
				$startsite = false;
             $username = $_GET['profile'];
			   echo '<div class="feed col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 text-center">';
            getProfile($username);
			  echo '</div>';
        }else {
			$startsite = true;
		}
               
		   }
           if($startsite) {








      echo '<div class="feed col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 text-center">';

                   
                 
                   timeFeed($user);

    echo '</div>';

		   }
		   

           















require '../styles/files/bootstrap-bottom.php';

?>
