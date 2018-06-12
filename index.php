<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ghoster - Alpha</title>
    </head>
    <body>
        <?php
           include_once 'login/login.php';
           $startsite = true;
           
           if($startsite) {
           ?>
        
           <div class="feed">
                   <?php
                   require 'profile.php';
                   $nick = $_SESSION['nick'];
                   $timeFeed($nick);
                   ?>
           </div>
           <?php
           }elseif ($profile) {
                                 require 'profile.php';
                   $nick = $_SESSION['nick'];
                   $getProfile($nick); 
           }
           
        ?>
    </body>
</html>
