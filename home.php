<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>AstraRP</title>
		<link href="assets/css/style_home.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>AstraRP Panel</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profil</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Déconnexion</a>
			</div>
		</nav>
		<div class="content">
			<h2>Page de Bienvenue</h2>
			<p>Bonjour, <?=$_SESSION['name']?>!</p>
					<br></br>
					<br></br>
			<center>
				<button onclick="window.location.href = 'infos/ban.php';">BAN LIST</button>
					<br></br>
					<br></br>
				<button onclick="window.location.href = 'infos/register.php';">REGISTER</button>
					<br></br>
					<br></br>
				<button onclick="window.location.href = 'infos/users.php';">USERS</button>
					<br></br>
					<br></br>
				<button onclick="window.location.href = 'secu/register.html';">NEW COMPTE</button>
		</div>
	</body>
</html>