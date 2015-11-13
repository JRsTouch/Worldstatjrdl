<?php 
	$stringConnection = 'mysql:host=localhost;dbname=world;charset=utf8';
	$pdo = new PDO($stringConnection, 'root', 'ctgzhcy');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// Appel du fichier Functions.php
	require ('Functions.php');

	// Declaration des variables de recuperation du GET
	$continent = "..." ;
	if ( isset($_GET['selectcontinent']) ){
		$continent = $_GET['selectcontinent'] ;
	}
	//echo $continent;

	// Declaration des variable des fontions appelées
	$getContinentByName = getContinentByName($pdo);	
	$nbCountriesByContinent = nbCountriesByContinent($pdo,$continent);
	$nbPopulationByContinent= nbPopulationByContinent($pdo,$continent);
	$totalAreaGlobal = totalAreaGlobal($pdo);
	$totalAreaByContinent = totalAreaByContinent($pdo ,$continent);
	$areaRatio = round( (($totalAreaByContinent *100)/$totalAreaGlobal),2);
	$mostpeopleIn = mostpeopleIn($pdo ,$continent);
	$averageLifeByContinent = averageLifeByContinent($pdo ,$continent);
	$AverageLife= round((AverageLife($pdo ,$continent)),2);
	
	//echo $areaRatio;
	//echo '<pre>';
	//print_r($totalAreaByContinent);
	//echo '</pre>';

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
			<form action="#" method="get" accept-charset="utf-8">
			<select name="selectcontinent">
				<?php

				foreach ($getContinentByName as $key => $value) {
				echo '<option value="'.$value['Continent'].'">'.$value['Continent'].'</option>';
			}

			?>
			</select>
			<input type="submit" name="submit" value=" OK" />
			</form>
			<div id="continentstat">
				<h2>Démographie</h2>
				<?php 
				echo 'Nombre de pays :'.$nbCountriesByContinent.'<br/>';
				echo 'Population :'.$nbPopulationByContinent['Population'].'<br/>';
				echo 'Surface totale :'.$totalAreaByContinent.' ( '.$areaRatio.'% de la surface totale habitée.)<br/>';
				echo 'Pays le plus habité :'.$mostpeopleIn.'<br/>';
				echo 'Pays avec la plus haute espérance de vie :'.$averageLifeByContinent['Name'].'( '.$averageLifeByContinent['LifeExpectancy'].' ans)<br/>';
				echo 'Espérance de vie moyenne :'.$AverageLife.'ans.<br/>';
				 ?>
				<h2>Economie</h2>
				<?php 



				 ?>
			</div>	
		</div>
		<div  id="pays">
			
		</div>
	</main>
</body>
</html>