<?php
	//header("content-type:image/jpeg");
	
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
	.grid-container
	{
		
		display: grid;
		grid-template-columns: auto auto auto;
	}
	
	div.grid-item:hover 
	{
		border: 5px solid #0066cc;
	}
	.grid-item 
	{
		margin: 7px;
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
	</style>
	";
	$b = new mysqli('localhost', 'root', '', 'inchirieriauto');

	if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com = "SELECT * FROM `masini`"; 
	

	$info = $b->query($com);
	echo '<div class="centrat"></br><h1>Maşinile disponibile</h1></br></br></div>';
	echo '<div class="grid-container">';
	if ($info->num_rows > 0) {
	while($row = $info->fetch_assoc()) {
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

	echo '</div>';
	echo "<div class='centrat'>";
	echo '<br><a href="../paginaP.html"><button >Pagina Principală</button></a>';
	echo '</div>';
	echo '</br></br></br></br>';
	}
	else {
	echo 'Nu au fost gasite rezultate';
	}	
	
	$b->close();


?>