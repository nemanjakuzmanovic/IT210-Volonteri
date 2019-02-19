<?php
require_once('connect.php');
require_once('check.php');
if(!$is_mod){
	header('Location: index.php');
	exit(0);
}
$id = intval($_GET['idd']);
$prisutnost = $_GET['prisutnost'];

$ins = $conn->query('UPDATE volonteri SET prisustvo = 0 WHERE akcija = ' . $id);
for($i = 0; $i < count($prisutnost); $i++){
	$upd = $conn->prepare('UPDATE volonteri SET prisustvo = 1 WHERE akcija = '.$id.' AND volonter = :volonter');
	$upd->bindParam(':volonter', $prisutnost[$i]);
	$upd->execute();
}
header('Location: prisustva-mod.php?id=' . $id);
?>