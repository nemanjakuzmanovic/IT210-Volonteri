<?php
$title = "dodaj akciju";
include('header.php');
if(!$is_mod){
	header('Location: index.php');
	exit(0);
}
$stmt = $conn->query('SELECT * FROM korisnici WHERE kontrola = 2');
$stmt->execute();
$all = '<select name="volonteri[]" multiple>';
while($vol = $stmt->fetch()){
	$all .= '<option value="'.$vol['id'].'">'.$vol['ime_korisnika']. ' ' . $vol['prezime_korisnika'] . ' - '. $vol['telefon_korisnika'] .'</option>';
}
$all .= '</select>';
?>
<form action="sacuvajAkciju.php" method="POST" class="formStyle">
	<input type="text" name="naziv_akcije" placeholder="Naziv akcije"/> <br><br>
	<textarea rows="4" cols="50" name="opis_akcije" placeholder="Opis Vase akcije"></textarea>
	<p>Izaberite volontera: </p>
	<?php echo $all;?>
	<input type="submit" value="Send"/>
</form>
<?php

include('footer.php');
?>