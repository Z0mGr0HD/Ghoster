<?php

 function addLike($postid) {
	 require '../config/config.init.php';
	 
	
		$statement1 = $pdo->prepare("SELECT * FROM posts WHERE mid = :mid");
        $result = $statement1->execute(array('mid' => $postid));
        $user = $statement1->fetch();
		
		$i = $user['likes'];
	 $statement = $pdo->prepare('UPDATE `posts` SET `likes`= :like WHERE `mid` = :id');
		
		
			// run query
		   ++$i;
			$result = $statement->execute(array('like' => $i, 'id' => $postid));
 }
 
  function addRepost($postid) {
	 require '../config/config.init.php';
	 
	
		$statement1 = $pdo->prepare("SELECT * FROM posts WHERE mid = :mid");
        $result = $statement1->execute(array('mid' => $postid));
        $user = $statement1->fetch();
		
		$i = $user['repost'];
	 $statement = $pdo->prepare('UPDATE `posts` SET `repost`= :repost WHERE `mid` = :id');
		
		
			// run query
		   ++$i;
			$result = $statement->execute(array('repost' => $i, 'id' => $postid));
 }
 
 function getLikes($postid) {
	 		 require '../config/config.init.php';
		$statement1 = $pdo->prepare("SELECT * FROM posts WHERE mid = :mid");
        $result = $statement1->execute(array('mid' => $postid));
        $user = $statement1->fetch();
		
		$i = $user['likes'];
		
		return $i;
		
	 
 }
 
  function getRepost($postid) {
	 		 require '../config/config.init.php';
		$statement1 = $pdo->prepare("SELECT * FROM posts WHERE mid = :mid");
        $result = $statement1->execute(array('mid' => $postid));
        $user = $statement1->fetch();
		
		$i = $user['repost'];
		
		return $i;
		
	 
 }