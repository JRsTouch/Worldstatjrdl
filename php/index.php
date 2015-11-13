<?php 
	// Connexion a la base de données

	$stringConnection = 'mysql:host=localhost;dbname=world;charset=utf8';
	$pdo = new PDO($stringConnection, 'root', 'root');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// Appel du fichier Functions.php
	require ('Functions.php');


	// Declaration des variables de recuperation du GET

	$codeCountry = $_GET['country'];



	// Declaration des variable des fonctions appelées

	$getCountryByName = getCountryByName($pdo);

	
	$getCapitalbyCountry = getCapitalbyCountry($pdo, $codeCountry);

	$getMostInhabitedcityByCountry = getMostInhabitedcityByCountry($pdo, $codeCountry);

	$getNumberOfCity = count(getNumberOfCity($pdo, $codeCountry));

	$OfficialLanguage = OfficialLanguage($pdo, $codeCountry);

	$UnOfficialLanguage = UnOfficialLanguage($pdo, $codeCountry);

	$GNP = GNP($pdo, $codeCountry);


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
			<form action="#" method="GET">
				<select name="country">
				<?php
					foreach($getCountryByName as $key => $value){
						echo '<option value="'.$value['Code'].'"';
						if ($value['Code'] == $codeCountry){
							echo 'selected';
						}
						echo '>'.$value['Name'].'</option>';
					}
				?>
				</select>
				<input type="submit" name="OK" value="save">
			</form>
			
			<div id="infoPays">

				<h2>Démographie</h2>
				
				<?php 
					echo '<p>Capitale : '.$getCapitalbyCountry['Name'].'</p>';
					echo '<p>Ville la plus habitée : '.$getMostInhabitedcityByCountry['Name'].'</p>';
					echo '<p>Nombre de villes : '.$getNumberOfCity.'</p>';
					echo '<p>Langue Officiel : '.$OfficialLanguage['Language'].'</p>';
					echo '<label>Langue non Officiel:<ul>';
					foreach ($UnOfficialLanguage as $key => $value){
						echo '<li>'.$value['Language'].' parlé à '.$value['percentage'].'%';
					}
					echo '</ul></label>';
				?>

				<h2>Economie</h2>

				<?php
					echo '<p>PNB : '.$GNP['GNP'].'</p>';
				?>
			</div>
		</div>
	</main>
</body>
</html>