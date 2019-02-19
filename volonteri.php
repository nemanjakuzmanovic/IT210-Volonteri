<?php 

$title = "volonteri";
include('header.php');
if(!$is_mod){
	header('Location: index.php');
	exit(0);
}

$stmt = $conn->query('SELECT * FROM korisnici WHERE kontrola = 2');
$stmt->execute();


$sviVolonteri = '<div class="volonteriKlasa">';
while($volonter = $stmt->fetch()){
		$sviVolonteri .='<a href="volonter.php?id='.$volonter['id'].'"><div><div class="fV">'.$volonter['ime_korisnika'].'</div>';
		$sviVolonteri .='<div class="sV">'.$volonter['prezime_korisnika'].'</div>';
		$sviVolonteri .='<div class="tV">'.$volonter['telefon_korisnika'].'</div></div></a>';
}

$sviVolonteri .= '</div>';

 ?>

 <form action="dodajVolontera.php" method="GET" class="formStyle">
 		<input type="text" name="ime_volontera" placeholder="ime"/>
 		<input type="text" name="prezime_volontera" placeholder="prezime"/>
 		<input type="text" name="telefon_volontera" placeholder="telefon"/>
 		<input type="text" name="korIme" placeholder="korisnicko ime"/>
 		<input type="password" name="korSifra" placeholder="sifra"/>
 		<input type="submit" value="Dodaj"/>
 		</form>
 		<br><br>
 		
<?php 
echo $sviVolonteri;
include('footer.php');



 ?>