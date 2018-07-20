<!doctype html>

<html>
    <head>
        <title>Ghoster - Profile</title> 
    </head>
    
    <body>
        <?php
        
   
        
        function getProfile($user) {
            require '../config/config.init.php';
         
            
            $ppic = profilePicture($user);
           
        
			
            echo countGhosts($user);
            timeFeed($user);
            
            
            
            
        }
		function countGhosts($user) {
			 require '../config/config.init.php';
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
            require '../config/config.init.php';
            
            $exe = $pdo->prepare("SELECT * FROM gusers WHERE username = :user");
            $result = $exe->execute(array(':user' => $user));
            $get = $exe->fetch();
            
            if($get == false) {
                return null;
        }else {
            $pic = $get['picture'];
            return $pic; 
            
        }
            
        }
        
        function timeFeed($user) {
            require '../config/config.init.php';
             $exe1 = $pdo->prepare("SELECT * FROM repost WHERE touser = :user");
            $exe1->execute(array(':user' => $user));
            
            $exe = $pdo->prepare("SELECT * FROM posts WHERE fromuser = :user");
            $exe->execute(array(':user' => $user));
            
            while($row = $exe->fetch() or $row1 = $exe1->fetch()) {
             $ppic = profilePicture($user);
				?><img src="../uploads/<?php echo $ppic; ?>" class="rounded-circle" style="width:35px;height:35px;" /><?php
                echo "<a href=?profile=".$row['fromuser'].">".$row['fromuser']."</a><br />";
                echo "<a href=?id=".$row['mid'].">".$row['message']."<br />";
			  if(isset($row1)){
                echo $row1['fromuser']."<br />";
                echo $row1['message']."<br />";
			  }
            }
        }
        
        
        
        ?>
        
        
    </body>
</html>