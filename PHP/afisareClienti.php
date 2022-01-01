<?php

	echo "<style> body 
	{  
		background-color: #DCDCDC;
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
	.grid-item 
	{
		width:50%;
		margin: auto;
		border: 4px solid #00BFFF;
		text-align: center;
		box-shadow: 0px 0px;
	}
	</style>";
	$b = new mysqli('localhost', 'root', '', 'inchirieriauto');

	if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com = "SELECT * FROM `utilizatori`"; 
	
	echo '<div class="centrat">';
	echo "<h1>Utilizatori</h1>";
	$info = $b->query($com);
	if ($info->num_rows > 0) {

	while($row = $info->fetch_assoc()) {
		echo '<div class="grid-item">';
		echo '<p style="font-size:18px"> Nume: </br>'. $row['Nume'].'</p>';
		echo '<p style="font-size:18px"> Email: </br>'. $row['Email'].'</p>';
		echo '</div></br>';
	}
	echo '</div>';
	
	echo '<div class="centrat">';
	echo '<br><a href="../gestionareMasini.html"><button>Pagina Principală</button></a>';
	echo '</div>';
	}
	else {
	echo 'Nu au fost găsite rezultate';
	}	
	
	$b->close();

?>