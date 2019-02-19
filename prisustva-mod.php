<?php
$title = "prisustva";
include('header.php');
if(!$is_mod){
	header('Location: index.php');
	exit(0);
}
$id = (isset($_GET['id']) ? intval($_GET['id']) : 0);
$stmt = $conn->query('SELECT * FROM akcija');
$stmt->execute();
$select = '<select id="select" onchange="newOpen()"><option value="0">Izaberite akciju</option>';
while($row = $stmt->fetch()){
	$select .= '<option value="'.$row['id'].'" '.($id == $row['id'] ? 'selected' : '').'>'.$row['naziv_akcije'].' ('.$row['datum_akcije'].')</option>';
}
$select .= '</select>';


if($id != 0){
	$st = $conn->query('SELECT v.*, k.ime_korisnika, k.prezime_korisnika, k.telefon_korisnika FROM volonteri v LEFT JOIN korisnici k ON (v.volonter = k.id) WHERE v.akcija = ' . $id);
	$st->execute();
	$volonteri = '<div class="tableVol"><form action="sacuvajPrisustvo.php" method="GET"><input type="hidden" name="idd" value="'.$id.'"/>';
	while($row = $st->fetch()){
		$volonteri .= '<div class="divVolT'.($row['prisustvo'] ? ' trueP' : '').'"><div class="div1">'.$row['ime_korisnika'].' '.$row['prezime_korisnika'].'</div><div class="div2">'.$row['telefon_korisnika'].'</div><div class="div3"><input type="checkbox" name="prisutnost[]" value="'.$row['volonter'].'" '.($row['prisustvo'] ? 'checked' : '').'></div></div>';
	}
	$volonteri .= '<input type="submit" value="Save" class="button" style="margin-top: 20px;"/></form></div>';
}


?>
<div class="formStyles">
<?php 
echo $select;
?>
</div>

<script>
function newOpen(){
	var id = document.getElementById('select').value;
	window.location.href = 'prisustva-mod.php?id=' + id;
}
</script>

<?php
if($id != 0){
	echo $volonteri;
}
include('footer.php');
?>