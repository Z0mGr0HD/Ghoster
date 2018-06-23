<!doctype php>

<html>
    <head>
        <title><?php $title ?> - Profile</title> 
    </head>
    
    <body>
        <?php
        
        if(isset($_POST['yourprofile'])) {
            $username = $_SESSION['username'];
            getProfile($username);
        }
        if(isset($_GET['profile'])) {
             $username = $_POST['username'];
            getProfile($username);
        }
        
        
        function getProfile($user) {
            require 'config/config.init.php';
         
            
            $ppic = profilePicture($user);
           
            ?> <img src="<?php $ppic ?>" style="width:30px;height:30px;" /> <?php
            countGhosts($user);
            timeFeed($user);
            
            
            
            
        }
		function countGhosts($user) {
			 require 'config/config.init.php';
			$exe = $pdo->prepare("SELECT mid FROM posts WHERE fromuser = :user");
            $exe->execute(array(':user' => $user));
            $exe->fetch();
			$i = null;
			while($row = $exe->fetch()) {
				$i++;
			}
			
			return $i;
			
		}
        
        function profilePicture($user) {
            require 'config/config.init.php';
            
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
            require 'config/config.init.php';
             $exe1 = $pdo->prepare("SELECT * FROM repost WHERE touser = :user");
            $exe1->execute(array(':user' => $user));
            
            $exe = $pdo->prepare("SELECT * FROM posts WHERE fromuser = :user");
            $exe->execute(array(':user' => $user));
            
            while($row = $exe->fetch() or $row1 = $exe1->fetch()) {

				
                echo "<a href=?profile=".$row['fromuser'].">".$row['fromuser']."<br /></a>";
                echo $row['message']."<br />";
			  if(isset($row1)){
                echo $row1['fromuser']."<br />";
                echo $row1['message']."<br />";
			  }
            }
        }
        
        
        
        ?>
        
        
    </body>
</html>