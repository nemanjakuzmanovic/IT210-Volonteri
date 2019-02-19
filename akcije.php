<?php 

$title = "akcije";
include('header.php');

$stmt = $conn->query('SELECT * FROM akcija ORDER BY datum_akcije DESC');
$stmt->execute();
$all = '<div class="akcijaClass">';

while($volonter = $stmt->fetch()){
	$st = $conn->query('SELECT v.*,k.ime_korisnika, k.prezime_korisnika FROM volonteri v LEFT JOIN korisnici k ON (v.volonter = k.id) WHERE v.akcija = '. $volonter['id']);
	$st->execute();
	$sviV = 'Volonteri: ';
	$count = 0;
	while($volonterI = $st->fetch()){
		$sviV .=($count != 0 ? ', ' : '') . '<a href="volonter.php?id='.$volonterI['volonter'].'">'.$volonterI['ime_korisnika'].' '.$volonterI['prezime_korisnika'].'</a>';
		$count++;
	}
	$all .= '<div class="VTabela"><div class="VTAB"><p class="p1">'.$volonter['naziv_akcije'].'</p><p class="p3">Opis: '.$volonter['opis_akcije'].'</p>'.($is_mod ? '<p class="p2">'.$sviV.'</p>' : '').'</div>';

	$all .= '<div class="VTAB2">'.$volonter['datum_akcije'].'</div></div>';
}

$all .= '</div>';
?>
<?php echo ($is_mod ? '<div class="formStyle"><a class="button" href="dodajAkciju.php">Dodaj novu akciju</a></div>' : '');?>

<?php
echo $all;
include('footer.php');






 ?>