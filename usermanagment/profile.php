<!doctype php>

<html>
    <head>
        <title><?php $title ?> - Profile</title> 
    </head>
    
    <body>
        <?php
        
        if(isset($_POST['yourprofile'])) {
            $nick = $_SESSION['nick'];
            getProfile($nick);
        }
        if(isset($_GET['profile'])) {
             $nick = $_POST['nick'];
            getProfile($nick);
        }
        
        
        function getProfile($user) {
            require '../config/config.init.ph';
            require '../config/language.php';
            
            $ppic = profilePicture($user);
           
            ?> <img src="<?php $ppic ?>" style="width:30px;height:30px;" /> <?php
            
            timeFeed($user);
            
            
            
            
        }
        
        function profilePicture($user) {
            require '../config/config.init.ph';
            
            $exe = $pdo->prepare("SELECT picture FROM gusers WHERE username = :user");
            $exe->execute(array(':user' => $user));
            $exe->fetch();
            
            if($exe == null) {
                return false;
        }else {
            $pic = $exe['picture'];
            return $pic; 
            
        }
            
        }
        
        function timeFeed($user) {
            require '../config/config.init.php';
            
            
             $exe1 = $pdo->prepare("SELECT * FROM repost WHERE touser = :user");
            $exe1->execute(array(':user' => $user));
            
            $exe = $pdo->prepare("SELECT * FROM posts WHERE fromuser = :user");
            $exe->execute(array(':user' => $user));
            
            while($row = $exe->fetch() && $row1 = $exe1->fetch()) {
                echo $row['fromuser']."<br />";
                echo $row['message']."<br />";
                echo $row1['fromuser']."<br />";
                echo $row1['message']."<br />";
            }
        }
        
        
        
        ?>
        
        
    </body>
</html>