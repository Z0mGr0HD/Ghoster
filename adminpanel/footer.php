<div class="col-xs-12 text-center footer">
		<a style="color:red" href="/adminpanel/index.php">Adminpanel | Home</a>
		&#xb7;
		<a style="color:mediumblue" href="../index.php">Ghoster | Home</a>
		<br>Designed by Markus and Function by Z0mGr0HD 
		<br style="color:red">&copy 2016 Adminpanel
		<br><?php  $nickname = $_SESSION['username']; $ppic = $_SESSION['picture']; $pic = "../uploads/".$ppic; echo "<img src='$pic' width='30' height='30'> Hallo $nickname.";    ?>
	</div>