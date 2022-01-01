<?php
$nume=$_POST["numem"];
	$producator=$_POST["produc"];
	
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
			$masina="Delete from `masini` where NumeMasina='".$nume."'";
			if(mysqli_query($b,$masina))
				echo "Masina a fost stearsa";
			else
				echo "Proces esuat". mysqli_errno($b). " : ". mysqli_error($b);
		}
		else
		{
			echo "Maşina nu se află în baza de date";
		}
$b->close();


?>