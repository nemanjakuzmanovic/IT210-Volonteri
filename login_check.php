<?php 

if(isset($_SESSION['username'])){
	header('Location: index.php');
	exit(0);
}


require_once('connect.php');
$username = $_POST['username1'];
$password = $_POST['password1'];

$stmt = $conn->prepare('SELECT COUNT(*) as BROJ FROM korisnici WHERE username = :username AND password = :password');

$stmt->bindParam(":username",$username);
$stmt->bindParam(":password",$password);

$stmt->execute();
$row = $stmt->fetch();

echo "Niste uneli zadovoljavajucu formu! ";
echo "Molimo Vas da pokusate ponovo, ili se registrujte!";

if($row['BROJ'] != 0){
	session_start();
	$_SESSION['username'] = $username;
	header('Location: index.php');
}





 ?>