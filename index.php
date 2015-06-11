<?php

//Ajout d'un commentaire test
//2e commentaire test

//8. Lorsque l'on arrive la première fois sur "le site", il faut afficher toutes 
//les tâches. Utiliser la fonction fgetcsv ainsi que feof

//Code de récupération des tâches:
$toutesLesTaches = [];

$file = fopen("data.csv","r");

while(! feof($file)){
	$uneTache = fgetcsv($file);
	if($uneTache != false){
 		$toutesLesTaches[] = $uneTache;
 	}
}
fclose($file);
//var_dump($toutesLesTaches);


//Inclusion du fichier html d'affichage du formulaire:
include "page.phtml";
