<?php
require_once('connect.php');
require_once('check.php');
if(!$is_mod){
	header('Location: index.php');
	exit(0);
}
$pime = strval($_GET['pretraga_imena']);




$stmt = $conn->prepare('SELECT ime_korisnika FROM korisnici WHERE ime_korisnika LIKE %:ime');
$stmt->bindParam(':ime', $pime);


$stmt->execute();

return $pime;

header('Location: volonteri.php');
?>