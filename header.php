<?php 

session_start();
if(!isset($_SESSION['username'])){
	header('Location: login.php');
	exit(0);
}

require_once('connect.php');
$stmt = $conn->prepare('SELECT * FROM korisnici WHERE username=:username');

$stmt->bindParam(":username", $_SESSION['username']);

$stmt->execute();
$USER = $stmt->fetch();
$is_mod = (intval($USER['kontrola']) == 1 ? true : false);

?>
 	<!DOCTYPE html>
 	<html>
 	<head>
 		<title><?php echo "Nemanja Kuzmanovic 2851"; ?></title>
 		<link rel="stylesheet" type="text/css" href="theme.css">
 	</head>
 	<body>
 	<header>
 		<a href="index.php"><li class="headerList">pocetna</li></a>
 		<?php 
 			echo ($is_mod ? '<a href="volonteri.php"><li class="headerList">volonteri</li></a>' : '');
 		?>
 		 <a href="akcije.php"><li class="headerList">akcije</li></a>
		<?php 
			echo ($is_mod ? '<a href="prisustva-mod.php"><li class="headerList">prisustva</li></a>' : '');
		?>
		<?php 
			echo (!$is_mod ? '<a href="volonter.php?id='.$USER['id'].'"><li class="headerList">prisustva</li></a>' : '');
		?>
		
		<a href="login.php?log=true"><li class="headerList" id="floatRight">Log out[ <?php echo $USER['ime_korisnika'] . ' ' . $USER['prezime_korisnika'];?> ]</li></a>
	</header>