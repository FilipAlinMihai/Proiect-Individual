<?php
	session_start();
	
	echo "<style>
	body 
	{  
		background-image: url('../imagini/background1.jpg');
	} 
	.centrat
	{
		text-align:center;
		box-shadow: 0px 0px;
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
	.formular
	{
		border:5px solid #00BFFF;
	}	
	button
	{
		font-size:130%;
		border-radius: 12px;
		background-color: #00BFFF;
		color: white;
		
	}
	</style>";
	$b=mysqli_connect( "localhost", "root",'',"inchirieriauto");
    if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com="SELECT * FROM `inchirieri`";
	$info=$b->query($com);
	
	echo '<div class="centrat">';
	echo "<h2>Maşinile închiriate în trecut</h2>";
	
	if($info->num_rows > 0)
	{
		$a=0;
		while($row=$info->fetch_assoc())
		{
			if($row['NumePersoana']==$_SESSION['numeutilizator'])
			{
				echo "<p style='font-size:130%'>"."A fost închiriată maşina : ".$row['NumeMasina']." în data de ".$row['Data']." iar închirierea are statutul ".$row['Statut']." cu Nota ".$row['Nota']." şi Codul ".$row['Cod']."</p>";
				$a=1;
			}
			
			if(strcasecmp($row['Statut'],"Admis")==0 && $row['Nota']==0)
			{
			echo '	<div class="center">
			<p style="font-size: 130%">Acordaţi o notă</p>
			<form action="Notare.php" method="post" class="formular">
			<table >
			<tr>  <td style="font-size:120%">Numele Maşinii</td> <td><input type="text"  name="masina"/></td> <tr>
			<tr>  <td style="font-size:120%">Producătorul</td> <td><input type="text"  name="prod"/></td> <tr>
			<tr>  <td style="font-size:120%">Nota</td> <td><input type="number"  name="nota"/></td> <tr>
			<tr>  <td style="font-size:120%">Codul Închirierii</td> <td><input type="number"  name="cod"/></td> <tr>
			<tr>  <td><input type="submit" ></td> </tr>
			</table>
			</form>
			</div>';
			}
		}
		
		if($a==0)
		{
		
			echo "Nu au fost găsite închirieri anterioare ";
		}
	}
	else
	{
		
		echo "Nu au fost găsite închirieri anterioare ";
	}
	echo '<br><a href="../paginaP.html"><button >Pagina Principală</button></a>';
	echo '</div>';
	$b->close();
?>