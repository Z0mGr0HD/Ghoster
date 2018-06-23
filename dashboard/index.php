<?php
include_once '../config/session.php';
echo 'Profil';   echo 'Nachrichten';






           $startsite = true;
           if($loggedin) {

           if($startsite) {








      echo '<div class="feed">';

                   require_once '../usermanagment/profile.php';
                   $nick = $_SESSION['nick'];



                   timeFeed($nick);

     echo '</div>';

           }elseif ($profile) {
                require_once '../usermanagment/profile.php';
                   getProfile($nick);
                   $nick = $_SESSION['username'];
           }
           }else {
			   $startsite = false;
		   }

















?>
