<?php 
	// Connexion a la base de données

	$stringConnection = 'mysql:host=localhost;dbname=world;charset=utf8';
	$pdo = new PDO($stringConnection, 'root', 'ctgzhcy');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// Appel du fichier Functions.php
	require ('Functions.php');

	// Declaration des variable des fonctions appelées


	// Declaration des variables de recuperation du GET

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>World Stats</title>
	<link rel="stylesheet" href="../css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="../js/javascript.js" type="text/javascript" charset="utf-8" async defer></script>
</head>
<body>
	<main>
		<div id="monde">
			
		</div>
		<div id="continent">
			
		</div>
		<div  id="pays">
			
		</div>
	</main>
</body>
</html>