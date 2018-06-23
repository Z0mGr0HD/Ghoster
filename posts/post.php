<html>
    <head>   
    </head>
    <body>
	  			 

        <?php

       function writePost($fromuser,$message) {
		  require 'config/config.init.php';
        $time = date("Y-m-d H:i:s");
        
		
        $statement = $pdo->prepare("INSERT INTO posts (mid, fromuser, message, time) VALUES (:mid, :fromuser, :message, :time)");
	    $result = $statement->execute(array(':mid' => null, ':fromuser' => $fromuser, ':message' => $message, ':time' => $time));
         
        if($result) {
            
        }else {
           die;
        }
        }
        
        function getMessage($id) {
            require_once 'config/config.init.php';
           
            $message = null;
            
            $exe = $pdo->prepare("SELECT * FROM posts WHERE mid = :mid");
            $exe->execute(array(':mid' => $id));
            
            while($row = $exe->fetch()) { 
              $message = $row['messeage'];
            }
            return $message;
            }
            
        
        
        function getPostID($fromuser) {
            $id = null;
            require_once 'config/config.init.php';
            
            
            
            $exe = $pdo->prepare("SELECT * FROM posts WHERE fromuser = :user");
            $exe->execute(array(':user' => $fromuser));
            
            while($row = $exe->fetch()) { 
              $id = $row['mid'];
            }
            return $id;
            }
            
            
            
  
        function repost($fromuser,$id,$touser) {
            
            require_once 'config/config.init.php';
 
            $message = getMessage($id);
            
             $statement = $pdo->prepare("INSERT INTO repost (mid, fromuser, message, touser) VALUES (:mid, :fromuser, :message, :touser)");
	    $result = $statement->execute(array(':mid' => null, ':fromuser' => $fromuser, ':message' => $message, ':touser' => $touser));
         
        if($result) {
            
        }else {
           die;
        }
		}
        
				 if(isset($_POST['sendmsg'])) {
                                     $error = false; 
                                     $msg = $_POST['message'];
            $user = $_SESSION["username"];
                if(strlen($msg) == 0) {
		$error = true;
	}
           if(!$error) {
            writePost($user,$msg);
           }
        }
		
					   ?>
		
			           <form method="POST" action="<?php echo($_SERVER['PHP_SELF']);?>">
            <input type="text" name="message" value="" size="75" />
            <button type="submit" value="Send" name="sendmsg"> Send </button>
        </form>
        <?php
        
        ?>
    </body>
</html>
