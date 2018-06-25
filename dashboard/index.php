<?php
require_once '../usermanagment/profile.php';

session_start();

$profile = false;
  $nick = $_SESSION['username'];

echo "<a href='?profile=$nick'>";   echo 'Nachrichten';
           if(isset($_SESSION["userid"])) 
   {   

               $startsite = true;
			   }else {
			   $startsite = false;
		   }
           if($startsite) {








      echo '<div class="feed">';

                   
                 
                   timeFeed($nick);

    echo '</div>';

		   }
           

















?>
