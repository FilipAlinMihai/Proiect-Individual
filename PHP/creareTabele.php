<?php

$b= new mysqli('localhost','root','','Inchirieriauto');
if(mysqli_connect_errno()){
	exit('Connect failed: '.mysqli_connect_error());
	}
	
	$sql="CREATE TABLE `utilizatori` (
	`Nume` VARCHAR(100) NOT NULL PRIMARY KEY,
	`Parola` VARCHAR(10) NOT NULL,
	`Email` VARCHAR(50) NOT NULL
	) ";
	if($b->query($sql)===TRUE)
		echo "Tabelul 'utilizatori' a fost creat cu succes <br/>";
	else 
		echo "Eroare".$b->error;
	
	$sql="CREATE TABLE `masini` (
	`NumeMasina` VARCHAR(100) NOT NULL PRIMARY KEY,
	`Producator` VARCHAR(100) NOT NULL,
	`Tip` VARCHAR(20) NOT NULL,
	`Pret` INT(5) ,
	`Numar` INT(2),
	`Imagine` LONGBLOB NOT NULL
	) ";
	if($b->query($sql)===TRUE)
		echo "Tabelul 'masini' a fost creat cu succes <br/>";
	else 
		echo "Eroare".$b->error;
	
	$sql="CREATE TABLE `inchirieri` (
	`Cod` INT(5) NOT NULL,
	`NumePersoana` VARCHAR(100) NOT NULL ,
	`NumeMasina` VARCHAR(100) NOT NULL,
	`Data` DATETIME NOT NULL,
	`Statut` VARCHAR(10) NOT NULL,
	`Nota` INT(2)
	) ";
	if($b->query($sql)===TRUE)
		echo "Tabelul 'inchirieri' a fost creat cu succes <br/>";
	else 
		echo "Eroare".$b->error;
	
	$sql="CREATE TABLE `Note` (
	`NumeMasina` VARCHAR(100) NOT NULL,
	`Producator` VARCHAR(100) NOT NULL,
	`NumarNote` INT(5) ,
	`Nota` FLOAT(2)
	) ";
	if($b->query($sql)===TRUE)
		echo "Tabelul 'Note' a fost creat cu succes <br/>";
	else 
		echo "Eroare".$b->error;
	$b->close();

?>