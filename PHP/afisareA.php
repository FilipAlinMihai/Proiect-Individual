<?php
	echo "<style> body {  background-color: #DCDCDC;} 
	.center {
	
	margin: auto;
	width: 50%;
	padding: 15px;
	border:5px solid #00BFFF
	}
	div{
	box-shadow: 10px 10px;
	}
	.formular{
	border:5px solid #00BFFF
	}	
	.centrat
	{
		text-align:center;
		box-shadow: 0px 0px;
	}
	.grid-container
	{
		
		display: grid;
		grid-template-columns: auto auto auto;
		box-shadow: 0px 0px;
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
	$com = "SELECT * FROM `masini`"; 
	

	$info = $b->query($com);
	if ($info->num_rows > 0) {
	echo '<div class="centrat"></br><h1>Maşinile disponibile</h1></br></br></div>';
	echo '<div class="grid-container">';
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
	echo '<br><div class="centrat"><a href="../gestionareMasini.html"><button>Pagina Principală</button></a></div></br>';
	}
	else {
	echo 'Nu au fost gasite rezultate';
	}	
	
	
	$b->close();
	echo '	<div class="center">
			<p style="font-size: 130%">Modificaţi numărul de maşini disponibile</p>
			<form action="NumarMasini.php" method="post" class="formular">
			<table >
			<tr>  <td style="font-size:120%">Numele Maşinii</td> <td><input type="text"  name="masina"/></td> <tr>
			<tr>  <td style="font-size:120%">Producătorul</td> <td><input type="text"  name="prod"/></td> <tr>
			<tr>  <td style="font-size:120%">Disponibile</td> <td><input type="number"  name="disp"/></td> <tr>
			<tr>  <td><input type="submit" ></td> </tr>
			</table>
			</form>
			</div>';
			
	echo '</br></br></br></br>';

?>