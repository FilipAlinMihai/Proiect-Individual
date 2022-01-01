<?php

	echo "<style>
	body 
	{  
		background-image: url('../imagini/background1.jpg');
	} 
	.centrat
	{
		text-align:center;
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
	echo "<h1>Închirieri Anterioare</h1></br>";
	
	$info = $b->query($com);
	if ($info->num_rows > 0) 
	{
		
	while($row = $info->fetch_assoc()) {
		echo '<b><p style="font-size:20">Codul: '.$row['Cod'].' Nume Client: '. $row['NumePersoana']. ' -- Nume Maşină : '. $row['NumeMasina']. ' -- Data: '. $row['Data']." --Status: ".$row['Statut']."</p><b>";
		
	}
	echo '<br><a href="../gestionareMasini.html"><button>Pagina Principală</button></a>';
	
	}
	else {
	echo 'Nu au fost găsite rezultate';
	}
	echo '</div>';	
	$b->close();

?>