<?php
require_once('connect.php');
require_once('check.php');
if(!$is_mod){
	header('Location: index.php');
	exit(0);
}
$naslov = $_POST['naziv_akcije'];
$opis = $_POST['opis_akcije'];
$volonteri = $_POST['volonteri'];


$stmt = $conn->prepare('INSERT INTO akcija (naziv_akcije, datum_akcije, opis_akcije) VALUES(:naziv_akcije, NOW(), :opis_akcije)');
$stmt->bindParam(":naziv_akcije", $naslov);
$stmt->bindParam(":opis_akcije", $opis);
$stmt->execute();
$stmt = $conn->prepare('SELECT MAX(id) AS BROJ FROM akcija');
$stmt->execute();
$id = $stmt->fetch();

for($i = 0; $i < count($volonteri); $i++){
	$stmt = $conn->prepare('INSERT INTO volonteri (akcija, volonter) VALUES('.$id[0].', :volonter)');

	$stmt->bindParam(":volonter", $volonteri[$i]);

	$stmt->execute();
}

header('Location: akcije.php');
?>