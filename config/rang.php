<?php


function getRang($user) {
    require 'config.init.php';
    
        $statement = $pdo->prepare("SELECT * FROM gusers WHERE username = :username");
        $result = $statement->execute(array('username' => $user));
        $users = $statement->fetch();
    
        $rang = $users['rang'];
        return $rang;
}

function addRang($rang,$user) {
     require 'config.init.php';
     $rangs = "User";
     switch ($rang) {
         case 1:
         $rangs = "Supporter";
             break;
         case 2:
             $rangs = "Moderator";
             break;
         case 3:
             $rangs = "Admin";
             break;
         default:
             break;
     }   
    $statement = $pdo->prepare('UPDATE `gusers` SET `rang`= :rang WHERE `username` = :username');
    $result = $statement->execute(array('rang' => $rangs, 'username' => $user));
 if($result)
	{    return "Succesfully added Rang".$rangs; }
}











?>
