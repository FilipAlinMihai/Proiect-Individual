<?php

	echo "<style> body 
		{ 
			background-color: #DCDCDC;
		}
		.center {
			margin: auto;
			width: 50%;
			padding: 15px;
			border:5px solid #00BFFF;
		}
		div{
			box-shadow: 10px 10px;
		}
		.formular{
			border:5px solid #00BFFF;
		}	
		.centrat
		{
			text-align:center;
			box-shadow: 0px 0px;
		}
		button
		{
			font-size:130%;
			border-radius: 12px;
			background-color: #00BFFF;
			color: white;
		}
		</style>";
	$b = new mysqli('localhost', 'root', '', 'inchirieriauto');

	if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com = "SELECT * FROM `inchirieri`"; 
	
	echo '<div class="centrat">';
	echo "<h1>Închirieri Anterioare</h1><br>";
	$info = $b->query($com);
	if ($info->num_rows > 0) {

	while($row = $info->fetch_assoc()) {
		if(strcasecmp($row['Statut'], 'Asteptare') == 0)
		echo '<b><p style="font-size:18">Codul: '.$row['Cod'].' Nume Client: '. $row['NumePersoana']. ' -- Nume Masina : '. $row['NumeMasina']. ' -- Data: '. $row['Data']." --Status: ".$row['Statut']."</p><b>";
		
	}
	echo '	<div class="center">
			<form action="decizie.php" method="post" class="formular">
			<table >
			<tr>  <td style="font-size:120%">Codul Încirierii</td> <td><input type="text"  name="codul"/></td> <tr>
			<tr>  <td style="font-size:120%">Decizia</td> <td><input type="text"  name="decizia"/></td> <tr>
			<tr>  <td><input type="submit" ></td> </tr>
			</table>
			</form>
			</div>';
	echo '<br><a href="../gestionareMasini.html"><button >Pagina Principală</button></a>';
	}
	else {
	echo 'Nu au fost găsite rezultate';
	}	
	echo '</div>';
	$b->close();

?>