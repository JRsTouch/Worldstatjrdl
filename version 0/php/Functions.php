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
function nbCountriesByContinent()
{
	//Nombre de pays par continent
}

function nbPopulationByContinent()
{
	//Population par continent
}

function totalAreaByContinent()
{
	//Surface totale par continent
	//Pourcentage de la surface totale habitée ?
}

function averageLifeByContinent()
{
	//Espérance de vie moyenne
}

function EconomyByContinent()
{
	//Richesse crée
}

// LISTE DES PAYS
function getCountryByName()
{
	//Remplir liste déroulante "PAYS"
} 

//PARTIE PAYS
function getHeadofStateByCountry()
{
	//Capitale par pays
}

function getMostInhabitedcityByCountry()
{
	//Ville la plus habitée du pays
}

function getPIBbyCountry()
{
	//PIB du pays
}


 ?>
