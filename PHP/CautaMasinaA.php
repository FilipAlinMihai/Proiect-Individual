<?php
	$masina=$_POST["masina"];
	echo "<style>
	body 
	{  
		background-image: url('../imagini/background1.jpg');
		background-size: 1700px 2000px;
	} 
	.centrat
	{
		text-align:center;
	}
	
	div.grid-item:hover 
	{
		border: 5px solid #0066cc;
	}
	.grid-item 
	{
		width:50%;
		margin: auto;
		border: 4px solid #00BFFF;
		text-align: center;
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
	$com = "SELECT * FROM `masini`"; 
	
	$info = $b->query($com);
	$a=0;
	if ($info->num_rows > 0) {
	
	echo '<div class="centrat"></br><h2>Rezultatele Căutării</h2></br></br>';
	while($row = $info->fetch_assoc()) {
		if(strcasecmp($masina, $row['NumeMasina']) == 0)
		{
			$a=1;
			echo '<div class="grid-item">';
			echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Imagine'] ).'" width="350" height="200"/>';
			echo '<p style="font-size:18"> Nume: '. $row['NumeMasina']."</p>";
			echo '<p style="font-size:18"> -- Producător : '. $row['Producator']."</p>";
			echo '<p style="font-size:18"> -- Tip: '. $row['Tip']."</p>";
			echo '<p style="font-size:18"> -- Preţ: '.$row['Pret']."</p>";
			echo '<p style="font-size:18"> --Disponibile: '.$row['Numar']."</p>";
		
		
			$incirieri="select * from note where NumeMasina='".$row['NumeMasina']."' and Producator='".$row['Producator']."'";
			$date=$b->query($incirieri);
			if($date->num_rows > 0)
			{
				$row1 = $date->fetch_assoc();
				echo '<p style="font-size:25"> --Nota: '.round($row1['Nota'],2)."</p>";
				echo '<p style="font-size:18"> --Notată de : '.$row1['NumarNote']." utilizatori</p>";
			}
			else{
				$nr=0;
				$nota=10;
				echo '<p style="font-size:25"> --Nota: '.$nota."</p>";
				echo '<p style="font-size:18"> --Notată de : '.$nr." utilizatori</p>";
			}
		
			echo '</div>';
		}
	}
	if($a==0)
		echo 'Nu au fost găsite rezultate';
	}
	else 
	{
		echo 'Nu au fost găsite rezultate';
	}	
	echo '<br><a href="../gestionareMasini.html"><button>Pagina Principală</button></a>';
	echo '</div>';
	$b->close();
?>