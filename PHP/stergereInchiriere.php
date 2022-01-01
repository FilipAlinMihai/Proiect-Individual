<?php
$numeU=$_POST["numemClient"];
$numeM=$_POST["numemM"];
$producator=$_POST["producatorM"];
$cod=$_POST['cod'];

$nume=$producator." ".$numeM;

$b = new mysqli('localhost', 'root', '', 'inchirieriauto');

	if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com = "SELECT * FROM `inchirieri`"; 
	

	$info = $b->query($com);
	$a=0;
	if ($info->num_rows > 0) 
	{
		while($row = $info->fetch_assoc()) {
			if($row["NumePersoana"]==$numeU && $row["NumeMasina"]==$nume && $row['Cod']==$cod)
				$a=1;
		}
	}
	else {
	echo 'Nu au fost găsite rezultate';
	}	
	if($a==1)
	{
		$inchiriere="Delete from `inchirieri` where Cod=".$cod."";
			if(mysqli_query($b,$inchiriere))
				echo "Inchirierea a fost stearsa";
			else
				echo "Proces esuat". mysqli_errno($b). " : ". mysqli_error($b);
	}
	else
	{
		echo "Inchiriere nu exista";
	}
	
	echo '<br><a href="../gestionareMasini.html"><button>Pagina Principală</button></a>';
	$b->close();
?>