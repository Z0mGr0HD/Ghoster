<html>
    <head>
        <title>Ghoster</title>
    </head>
    <body>
    
     <?php
     require_once '../config/config.init.php';
      require_once '../config/language.php';  
        
      
      //hier ist die function zum blocken
     function block($user1,$user2) {
         $statement = $pdo->prepare("INSERT INTO userblock (user1,user2) VALUES (:user1 , :user2)");
	$result = $statement->execute(array('user1' => $user1, 'user2' => $user2));
         
        if($result) {
         echo $block;
        }else echo 'ERROR';
         } 
        function isBlocked($user1,$user2) {
            $statement = $pdo->prepare("SELECT * FROM userblock WHERE user1 = :user1 AND user2 = :user2");
        $result = $statement->execute(array('user1' => $user1, 'user2' => $user2));
        $user = $statement->fetch();
        
        if($user == false) {
            $blocked = false;
        }else {
            $blocked = true;
        }
        }
        
        function UnBlock($user1,$user2) {
               $statement = $pdo->prepare("DELETE FROM userblock (user1,user2) VALUES (:user1 , :user2)");
	$result = $statement->execute(array('user1' => $user1, 'user2' => $user2));
        
        if($result) {
            echo $unblock;
        }else {
            echo 'ERROR';
        }
        }
      
        
       
        
    
        
        
        
        
     ?>
    </body>
    
</html>
