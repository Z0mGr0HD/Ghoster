<html>
    <head>
        <?php
        require_once '../config/config.init.php';
        require_once '../config/language.php';
        
        ?>
    </head>
    <body>
<?php


function isFriends($user1,$user2) {
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

function friendRequest($user1,$user2) {
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