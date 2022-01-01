<?php
	session_start();
	$num=$_POST["numeM"];
	$marca=$_POST["marcaM"];
	
	
	$b=mysqli_connect( "localhost", "root",'',"inchirieriauto");
    if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com="SELECT * FROM `masini`";
		$info=$b->query($com);
	if($info->num_rows > 0)
	{
		$a=0;
		while($row=$info->fetch_assoc())
		{
			if($row['NumeMasina']==$num && $row['Producator']==$marca)
				$a=1;
		}
		
		
		$codul=1;
		$verif=1;
		while($codul<1000 && $verif==1)
		{
			$comanda="select * from `inchirieri`";
			$info1=$b->query($comanda);
			$verif=0;
			while($row1=$info1->fetch_assoc())
			{
				if($row1['Cod']==$codul)
					$verif=1;	
			}
			if($verif==0 )
				break;
			$codul=$codul+1;
		}
		date_default_timezone_set("Europe/Bucharest");
		if($a==1)
		{	
			$n=0;
			$d=date("Y/m/d ").date("h:i");
			$s="Asteptare";
			$inchiriere="Insert into `inchirieri` (Cod,NumePersoana,NumeMasina,Data,Statut,Nota) values (".$codul.",'".$_SESSION['numeutilizator']."','".$marca." ".$num."','".$d."','".$s."',".$n.")";     
			
	
			if(mysqli_query($b,$inchiriere))
				echo "Date adaugate";
			else
				echo "Proces eşuat". mysqli_errno($b). " : ". mysqli_error($b);
		}
		else
		{
			echo "Maşina nu a fost găsită";
		}
	}
	else
	{
		echo "Maşina nu a fost găsită";
	}
	$b->close();
?>