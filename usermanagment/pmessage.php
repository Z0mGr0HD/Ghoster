<html>
    <head>
        <?php
        require_once 'usermanagment/block.php';
        ?>
    </head>
    
    <body>
        <?php
        
        function sendMessage($fromuser,$touser,$message) {
			require '../config/config.init.php';
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
			require '../config/config.init.php';
            $statement = $pdo->prepare("SELECT FROM pmessages * WHERE touser = :fromuser");
            $result = $statement->execute(array('fromuser' => $fromuser));
            $user = $statement->fetch();
            
            return $user;
        }
        
        if(isset($_GET['messages']) {
			?>
			
			<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">"
			
			<input type="text" name="touser" />
			<input type="text" name="msg"/>
		    <button name="send">Send</button>
			</form>
			<?php
		}
		if(isset($_POST['send']) {
			$touser = $_POST['touser'];
			$msg = $_POST['msg'];
			$user = $_SESSION['nick'];
			sendMessage($user,$touser,$msg);
			
		}
		
        
        
        
        ?>
        
    </body>
</html>
