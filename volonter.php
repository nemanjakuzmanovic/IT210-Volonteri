<?php

$title = "volonter";
include('header.php');
$ident = intval($_GET['id']);
if(!$is_mod && $ident != $USER['id']){
	
	header('Location: index.php');
	exit(0);
	
}
$stmt = $conn->query('SELECT * FROM korisnici WHERE id = ' . $ident);
$stmt->execute();
$VOLONTER = $stmt->fetch();

$volTrue = $conn->query('SELECT v.*, a.naziv_akcije, a.datum_akcije FROM volonteri v LEFT JOIN akcija a ON (a.id = v.akcija) WHERE v.volonter = ' . $ident . ' ORDER BY v.id DESC');
$volTrue->execute();
$svi = '<div class="prisVolTable">';
$c = 0;
while($pris = $volTrue->fetch()){
	$svi .= '<div class="pris1"><p>'.$pris['naziv_akcije'].' ( '.$pris['datum_akcije'].' )<span class="'.($pris['prisustvo'] ? 'yesP' : 'nouP').'">'.($pris['prisustvo'] ? 'da' : 'ne').'</span></p></div>';
	$c++;
}
if($c == 0){
	$svi .= '<div class="pris1"><p>Nema prijavljenih akcija!</p></div>';
}
$svi .= '</div>';
echo '<h1 class="volTextCenterTitle">Volonter: '.$VOLONTER['ime_korisnika'].' '.$VOLONTER['prezime_korisnika'].' ( '.$VOLONTER['telefon_korisnika'].' )'.'</h1>';

?>


<?php
echo $svi;
include('footer.php');
?>