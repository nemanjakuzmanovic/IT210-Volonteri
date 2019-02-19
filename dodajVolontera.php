<?php
require_once('connect.php');
require_once('check.php');
if(!$is_mod){
	header('Location: index.php');
	exit(0);
}
$ime = strval($_GET['ime_volontera']);
$prezime = strval($_GET['prezime_volontera']);
$korIme = strval($_GET['korIme']);
$korSifra = strval($_GET['korSifra']);
$telefon = strval($_GET['telefon_volontera']);
$username = strtolower($korIme);
$password = $korSifra;


$stmt = $conn->prepare('INSERT INTO korisnici(ime_korisnika, prezime_korisnika, username, password, kontrola, telefon_korisnika) VALUES(:ime, :prezime, :username, :password, 2, :telefon)');
$stmt->bindParam(':ime', $ime);
$stmt->bindParam(':prezime', $prezime);
$stmt->bindParam(':telefon', $telefon);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);

$stmt->execute();
header('Location: volonteri.php');
?>