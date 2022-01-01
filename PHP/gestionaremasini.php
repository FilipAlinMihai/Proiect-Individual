<?php
	$nume=$_POST["numemasina"];
	$producator=$_POST["producator"];
	$tip=$_POST["tip"];
	$pret=$_POST["pret"];
	$nr=$_POST["nr"];
	$imagine=addslashes (file_get_contents($_FILES['imagine']['tmp_name']));
	
	$b=mysqli_connect( "localhost", "root",'',"inchirieriauto");
    if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com="SELECT * FROM `masini`";
		$info=$b->query($com);
	$a=0;
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
			echo("Există o maşină cu acest nume şi producător");
		}
		else
		{
			$masinanoua="Insert into `masini` (NumeMasina,Producator,Tip,Pret,Numar,Imagine) values ('".$nume."','".$producator."','".$tip."',".$pret.",".$nr.",'".$imagine."')";
			if(mysqli_query($b,$masinanoua))
				echo "Maşina a fost adăugată";
			else
				echo "Proces eşuat". mysqli_errno($b). " : ". mysqli_error($b);
		}
$b->close();
?>