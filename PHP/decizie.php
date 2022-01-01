<?php
	$cod=$_POST['codul'];
	$decizie=$_POST['decizia'];
	$b = new mysqli('localhost', 'root', '', 'inchirieriauto');

	if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com = "update `inchirieri` set Statut='".$decizie."' where cod=".$cod." and Statut='Asteptare'"; 
	

	$info = $b->query($com);
	
	echo '<br><a href="InchirieriInAsteptare.php"><button style="font-size:120%">Revino la inchirieri</button></a>';
	$b->close();

?>