<?php
	$b = mysqli_connect( "localhost", "root", "")
		or die("Eroare la conectare cu MySQL");
	print "Conexiune la MySQL <br />";
	$creare=mysqli_query($b,"CREATE DATABASE InchirieriAuto");
	if($creare)
		echo "Baza de date InchirieriAuto a fost creată  <br />";
	else
		echo mysqli_errno($b)." : ".mysqli_error($b);
	mysqli_close($b);
?>