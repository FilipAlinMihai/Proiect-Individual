<?php
	$nume=$_POST["masina"];
	$producator=$_POST["prod"];
	$nr=$_POST['disp'];
	
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
			if($row['NumeMasina']==$nume && $row["Producator"]==$producator)
				$a=1;
		}
	}
	if($a==1)
		{
			$masina="Update `masini` set Numar=".$nr." where NumeMasina='".$nume."' and Producator='".$producator."'";
			if(mysqli_query($b,$masina))
				echo "Datele au fost modificate";
			else
				echo "Proces esuat". mysqli_errno($b). " : ". mysqli_error($b);
		}
		else
		{
			echo("Masina nu se afla in baza de date");
		}
$b->close();
?>