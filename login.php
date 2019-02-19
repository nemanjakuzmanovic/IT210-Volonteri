<?php 
if(isset($_GET['log'])){
	session_start();
	session_destroy();
	session_commit();
	header('Location: login.php');
	exit(0);
}

session_start();
if(isset($_SESSION['username'])){
	header('Location: index.php');
	exit(0);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login stranica: Nemanja Kuzmanovic 2851</title>
	<link rel="stylesheet" type="text/css" href="theme.css">
</head>
<body>
	<form action="login_check.php" method="POST" class="loginForm">
		<p>Unesite vase korisnicko ime:</p>
		<input type="text" name="username1" placeholder="Username"/>
		<p>Unesite vasu sifru:</p>
		<input type="password" name="password1" placeholder="Password"/>
		<br><br>
		<input type="submit" value="Login"/>
	</form>
<?php
include('footer.php');
?>