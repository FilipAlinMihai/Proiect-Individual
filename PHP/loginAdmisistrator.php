<?php

	$nume=$_POST["numeuADM"];
	$parola=$_POST["parolaA"];

	if($nume=="Administrator" && $parola=="ParoladeAdministrator")
		  header("Location: ../gestionareMasini.html");
	else
		echo "Pagina aceasta este dedicată administratorilor";
		
?>