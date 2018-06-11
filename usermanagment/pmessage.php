<html>
    <head>
        <?php
        require_once '../config/config.init.php';
        require_once '../config/language.php';
        require_once 'block.php';
        ?>
    </head>
    
    <body>
        <?php
        
        function sendMessage($fromuser,$touser,$message) {
            if(!isBlocked($fromuser,$touser)) {
            $isread = false;
            $time = date("Y-m-d H:i:s");
            
        $statement = $pdo->prepare("INSERT INTO pmessages (touser, fromuser, message, time, isread) VALUES (:touser, :fromuser, :message, :time, :isread)");
	$result = $statement->execute(array('touser' => $touser, 'fromuser' => $fromuser, 'message' => $message, 'time' => $time, 'isread' => $isread));
         
        if($result) {
            return true;
        }else {
            return false;
        }
        
        }else {return false;
        }
        }
        
        // Message Show
        
        function getMessage($fromuser) {
            $statement = $pdo->prepare("SELECT FROM pmessages * WHERE touser = :fromuser");
            $result = $statement->execute(array('fromuser' => $fromuser));
            $user = $statement->fetch();
            
            return $user;
        }
        
        
        
        
        
        ?>
        
    </body>
</html>
