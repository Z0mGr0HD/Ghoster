<html>
    <head>
        <?php
        require_once '../config/language.php';
        
        ?>
    </head>
    <body>
<?php


function isFriends($user1,$user2) {
	require '../config/config.init.php';
    $accepted = "accepted";
    $pending = "pending";
   
        $statement = $pdo->prepare("SELECT status FROM friends WHERE user1 = :user1 AND user2 = :user2");
        $result = $statement->execute(array('user1' => $user1, 'user2' => $user2));
        $user = $statement->fetch();
        
        if($user == $accepted) {
            return true;
        }else if($user == $pending){
            return false;
        }
}

function isFollowed($user1) {
	require '../config/config.init.php';
          
     $statement = $pdo->prepare("SELECT * FROM follow WHERE user1 = :user1");
        $result = $statement->execute(array('user1' => $user1));
        $user = $statement->fetch();
        
        if($user !== false) {
            return $user;
        }else{
            return false;
        }
}

function Follow($user1,$user2) {
		require '../config/config.init.php';
		
		if(isFollowed($user1,$user2) {
        unFollow($user1,$user2);
		}else {
				         $statement = $pdo->prepare("INSERT INTO follow (user1,user2) VALUES (:user1 , :user2, )");
	$result = $statement->execute(array('user1' => $user1, 'user2' => $user2));
         
        if($result) {
         echo "You Follow them now";
        }else{ 
            echo "ERROR";
         } 
		}
}

function unFollow($user1,$user2) {
			require '../config/config.init.php';
	
	
	$statement = $pdo->prepare("DELETE FROM follow (user1,user2) VALUES (:user1 , :user2, )");
	$result = $statement->execute(array('user1' => $user1, 'user2' => $user2));
         
        if($result) {
         echo "You Unfollow them now";
        }else{ 
            echo "ERROR";
         } 
	
}

function friendRequest($user1,$user2) {
	require '../config/config.init.php';
        $pending1 = "pending";
             if(!isFriends($user1,$user2)) {
         $statement = $pdo->prepare("INSERT INTO friends (user1,user2,status) VALUES (:user1 , :user2, :status)");
	$result = $statement->execute(array('user1' => $user1, 'user2' => $user2, 'status' => $pending1));
         
        if($result) {
         echo $friendrequest;
        }else{ 
            echo $pending;
         } 
         }
}

function getFriendStatus($user1,$user2) {
	require '../config/config.init.php';
        $accepted = "accepted";
    $pending = "pending";
   
        $statement = $pdo->prepare("SELECT status FROM friends WHERE user1 = :user1 AND user2 = :user2");
        $result = $statement->execute(array('user1' => $user1, 'user2' => $user2));
        $user = $statement->fetch();
        
        if($user == $accepted) {
            return $friends;
        }else if($user == $pending){
            return $pending;
        }
}

function deleteFriend($user1,$user2) {
	require '../config/config.init.php';
     if(!isFriends($user1,$user2)) {
               $statement = $pdo->prepare("DELETE FROM friends (user1,user2) VALUES (:user1 , :user2)");
	$result = $statement->execute(array('user1' => $user1, 'user2' => $user2));
        
        if($result) {
            echo $deleted;
        }else {
            echo 'ERROR';
        }
        }
}


?>
</body>
</html>