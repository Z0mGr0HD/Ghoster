<html>
    <head>
    <?php
      require_once '../config/config.init.php';
      require_once '../config/language.php';



?>    
    </head>
    <body>
        <?php
        function writePost($fromuser,$message) {
        $time = date("Y-m-d H:i:s");
            
        $statement = $pdo->prepare("INSERT INTO posts (fromuser, message, time) VALUES (:fromuser, :message, :time)");
	$result = $statement->execute(array('fromuser' => $fromuser, 'message' => $message, 'time' => $time));
         
        if($result) {
            return true;
        }else {
            return false;
        }
        }
        
        
        if(isset($_POST['send'])) {
            $msg = $_POST['message'];
            $user = $_SESSION["username"];
            writePost($user,$msg);
        }
        
        
        
        ?>
        
        <form method="POST" action="<?php echo($_SERVER['PHP_SELF']);?>">
            <input type="text" name="message" value="" size="100" />
            <input type="submit" value="Send" name="send" />
        </form>
        
    </body>
</html>
