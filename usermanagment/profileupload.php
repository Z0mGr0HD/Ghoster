<?php
 require '../config/config.init.php';
	 session_start();
// check for form request method
if(isset($_POST['upload1'])) 
{
	// check for uploaded file
	if(isset($_FILES['upload']))
	{
		// file name, type, size, temporary name
		$file_name = $_FILES['upload']['name'];
		$file_type = $_FILES['upload']['type'];
		$file_tmp_name = $_FILES['upload']['tmp_name'];
		$file_size = $_FILES['upload']['size'];
 
		// target directory
		$target_dir = "../uploads/";
$username = $_SESSION['username'];
$userid = $_SESSION['userid'];
$path_parts = pathinfo($_FILES['upload']['name']); 
$dateiname_neu = $username.$userid.".".$path_parts['extension'];  
		// uploding file
		if(move_uploaded_file($file_tmp_name,$target_dir.$dateiname_neu))
		{
			// connect to database
			
			// query
			$statement = $pdo->prepare('UPDATE `gusers` SET `picture`= :picture WHERE `username` = :username');
			
			// run query
			
			$pic = $target_dir . $file_name;
			$result = $statement->execute(array('picture' => $dateiname_neu, 'username' => $username));
			if($result)
			{
				echo "<p style='color:green'><b>File has been successfully uploaded</b></p>";
			}
			else
			{
			echo "<p>A system error has been occured</p>";
			}
		}
		else
		{
			echo "File can not be uploaded";
		}
	}
}

