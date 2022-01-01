<?php
	$nume=$_POST["masina"];
	$producator=$_POST["prod"];
	$nota=$_POST['nota'];
	$cod=$_POST['cod'];
	$a=0;
	$nr_nou=0;
	$nota_noua=0;
	
	if($nota>0 && $nota<=10)
	{
	$b=mysqli_connect( "localhost", "root",'',"inchirieriauto");
    if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	
	$com1 = "SELECT * FROM `inchirieri`"; 
	

	$info1 = $b->query($com1);
	if ($info1->num_rows > 0) 
	{
		while($row1 = $info1->fetch_assoc()) {
			if($row1["Cod"]==$cod)
			{
				$modif="Update `inchirieri` set Nota=".$nota." where cod=".$cod;
				if(!mysqli_query($b,$modif))
					echo "Proces esuat". mysqli_errno($b). " : ". mysqli_error($b);
			}
		}
	}
	
	$com="SELECT * FROM `note`";
		$info=$b->query($com);
	if($info->num_rows > 0)
	{
		
		while($row=$info->fetch_assoc())
		{
			$nr_nou=0;
			$nota_noua=0;
			if($row['NumeMasina']==$nume && $row["Producator"]==$producator)
			{
				$a=1;
				$nr_nou=$row['NumarNote']+1;
				$nota_noua=($row['NumarNote']*$row['Nota']+$nota)/$nr_nou;
				
				$modif2="Update `note` set Nota=".$nota_noua." where NumeMasina='".$nume."' and Producator='".$producator."'";
				if(mysqli_query($b,$modif2))
					echo "Nota a fost salvata<br>";
				else
					echo "Proces esuat". mysqli_errno($b). " : ". mysqli_error($b);
				
				$modif1="Update `note` set NumarNote=".$nr_nou." where NumeMasina='".$nume."' and Producator='".$producator."'";
				if(mysqli_query($b,$modif1))
					echo "Numarul a fost salvat";
				else
					echo "Proces esuat". mysqli_errno($b). " : ". mysqli_error($b);
			}
		}
	}
	if($a==0)
		{
			$nr_note=1;
			$masina="Insert into `Note` (NumeMasina,Producator,NumarNote,Nota) values ('".$nume."','".$producator."',".$nr_note.",".$nota.")"; ;
			if(mysqli_query($b,$masina))
				echo "Datele au fost adaugate";
			else
			echo "Proces esuat". mysqli_errno($b). " : ". mysqli_error($b);
		}
	$b->close();
	}
	else	echo "Nota trebuie să fie în intervalul 1 -10";
?>