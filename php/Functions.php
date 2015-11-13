<?php 

// Catégorie dans le "MONDE"...
function getTotalPopulation()
{
	//Récupérer la population totale
}

function getNbRegistredCities()
{
	//Récupérer le nombre de villes enregistrées
}

function getNbCountries()
{
	//Récupérer le nombre de pays
}

function getNbContinent()
{
	//Récupérer le nombre de continents
}

// LISTE DES CONTINENTS
function getContinentByName($pdo)
{
	$sql= 'SELECT country.Continent FROM `country` GROUP BY country.Continent';
	$stmt = $pdo->query($sql);
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $row;	
	//Remplir liste déroulante "CONTINENT"
}

//PARTIE CONTINENT
function nbCountriesByContinent($pdo ,$continent)
{
	$sql= 'SELECT COUNT(country.Name) AS nbr FROM country WHERE continent=:continent;';
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':continent', $continent);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return $row['nbr'];
}

function nbPopulationByContinent($pdo ,$continent)
{
	$sql= 'SELECT country.Population FROM `country` WHERE continent="'.$continent.'" GROUP BY country.Continent';
	$stmt = $pdo->query($sql);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return $row;	
}

function totalAreaByContinent($pdo ,$continent)
{
	$sql= 'SELECT SUM(country.SurfaceArea) as nbr FROM `country` WHERE continent="'.$continent.'" GROUP BY country.Continent';
	$stmt = $pdo->query($sql);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return $row['nbr'];
}

function totalAreaGlobal($pdo)
{
	$sql= 'SELECT SUM(country.SurfaceArea) as nbr FROM `country`';
	$stmt = $pdo->query($sql);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return $row['nbr'];
}

function mostpeopleIn($pdo ,$continent)
{
	$sql='SELECT country.Name FROM `country` WHERE continent="'.$continent.'" ORDER BY Population DESC LIMIT 1';
	$stmt = $pdo->query($sql);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return $row['Name'];	
}

function averageLifeByContinent($pdo ,$continent)
{
	$sql='SELECT country.Name,country.LifeExpectancy FROM `country` WHERE continent="'.$continent.'" ORDER BY LifeExpectancy DESC';
	$stmt = $pdo->query($sql);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return $row;	
}

function AverageLife($pdo ,$continent)
{
	$sql= 'SELECT AVG(country.LifeExpectancy) as nbr FROM `country`WHERE continent="'.$continent.'"';
	$stmt = $pdo->query($sql);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return $row['nbr'];
}

function EconomyByContinent()
{
	//Richesse crée
}

// LISTE DES PAYS
function getCountryByName($pdo,$continent){	
	$sql = 'SELECT Code, Name FROM `country` WHERE continent="'.$continent.'"';
	$stmt = $pdo->query($sql);
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $row;
	//Remplir liste déroulante "PAYS"
} 

//PARTIE PAYS
function getHeadofStateByCountry()
{
	//Capitale par pays
}

function getMostInhabitedcityByCountry($pdo, $codeCountry){
	$sql = 'SELECT city.Name FROM city, country WHERE city.CountryCode = country.Code AND country.Code = "'.$codeCountry.'" ORDER BY "city.Population" DESC LIMIT 1';
	$stmt = $pdo->query($sql);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return $row;
	//Ville la plus habitée du pays
}

function getPIBbyCountry()
{
	//PIB du pays
}

function getCapitalbyCountry($pdo, $codeCountry){
	$sql = 'SELECT city.Name FROM city, country WHERE city.CountryCode = country.Code AND country.Capital = city.ID AND country.Code = "'.$codeCountry.'"';
	$stmt = $pdo->query($sql);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return $row;
	//Capitale
}

function getNumberOfCity($pdo, $codeCountry){
	$sql = 'SELECT city.Name FROM city, country WHERE city.CountryCode = country.Code AND country.Code = "'.$codeCountry.'"';
	$stmt = $pdo->query($sql);
	$row = $stmt->fetchALL(PDO::FETCH_ASSOC);
	return $row;
	//Capitale
}

function OfficialLanguage($pdo, $codeCountry){
	$sql = 	'SELECT countrylanguage.Language '.
			'FROM countrylanguage, country  '.
			'WHERE countrylanguage.CountryCode = country.Code '.
			'AND countrylanguage.isOfficial = "T" '.
			'AND country.Code = "'.$codeCountry.'"';
	$stmt = $pdo->query($sql);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return $row;
	//Capitale
}

function UnOfficialLanguage($pdo, $codeCountry){
	$sql = 	'SELECT countrylanguage.Language, countrylanguage.percentage '.
			'FROM countrylanguage, country  '.
			'WHERE countrylanguage.CountryCode = country.Code '.
			'AND countrylanguage.isOfficial = "F" '.
			'AND country.Code = "'.$codeCountry.'"';
	$stmt = $pdo->query($sql);
	$row = $stmt->fetchALL(PDO::FETCH_ASSOC);
	return $row;
	//Capitale
}

function GNP($pdo, $codeCountry){
	$sql = 	'SELECT GNP '.
			'FROM country  '.
			'WHERE country.Code = "'.$codeCountry.'"';
	$stmt = $pdo->query($sql);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return $row;
	//Capitale
}




 ?>
