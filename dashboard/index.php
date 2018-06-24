<?php
require_once '../usermanagment/profile.php';
echo 'Profil';   echo 'Nachrichten';
session_start();

$profile = false;



           if(isset($_SESSION["userid"])) 
   {   

               $startsite = true;
			   }else {
			   $startsite = false;
		   }
           if($startsite) {








      echo '<div class="feed">';

                   
                   $nick = $_SESSION['username'];
                   timeFeed($nick);

    echo '</div>';

           }elseif ($profile) {
                
                   $nick = $_SESSION['username']; 
				   getProfile($nick);
           }
           

















?>
