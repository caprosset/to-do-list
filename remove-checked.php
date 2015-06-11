<?php
// var_dump de $toutesLesTaches
// Créer un tableau $tacheQueJeGarde vide
// parcourir avec la boucle foreach ou for le tableau $toutesLesTaches
// si l'id la tâche que je suis en train de parcourir est dans le tableau $_POST['id'] alors je prend pas: je fais rien
// Sinon je sauvegarde la tâche en cours dans le tableau $tacheQueJeGarde
// Utiliser in_array
//  var_dump de $tacheQueJeGarde
// enregistrer le tableau $tacheQueJeGarde dans le fichier data.csv
// fopen avec un mode ouverture ET sûppression total du contenu
// parcourir le tableau $tacheQueJeGarde
// utiliser fputcsv
// fclose

//var_dump($_POST);

//je recupere toutes les taches:
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


//je cree un tableau avec uniquement les taches à garder (celles qui ne sont pas dans le tableau delete dans $_POST)
$tacheQueJeGarde  = [];
for ($i=0; $i < count($toutesLesTaches); $i++){ 
if(in_array($i, $_POST["delete"])){

	}else{
		$tacheQueJeGarde[] = $toutesLesTaches[$i];
	}
}

//var_dump($tacheQueJeGarde);


//j'ouvre le fichier avec toutes mes taches (ouverture en mode w pour tout supprimer) et y réinsérer uniquement les taches que je garde
$file = fopen("data.csv", "w");

for ($i=0; $i < count($tacheQueJeGarde) ; $i++) { 
	fputcsv($file, $tacheQueJeGarde[$i]);
}

fclose($file);

header("Location:index.php?delete=ok");	
die();
