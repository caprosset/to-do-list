<!-- Traitement d'ajout d'une tache, qui renvoie sur la page index -->
<?php

//3. var_dump pour vérifier qu'on remonte bien les infos des 6 champs du formulaire

//tester si tous les champs existent, 
//4. si oui créer un tableau stockant les 5 données du formulaire

$tache=[];

if(array_key_exists("title", $_POST) && (empty($_POST["title"]) == false) && array_key_exists("description", $_POST) && (empty($_POST["title"]) == false) && array_key_exists("day", $_POST) && array_key_exists("month", $_POST) && array_key_exists("year", $_POST) && array_key_exists("priority", $_POST))
{
	//var_dump($_POST);
	
	$title=$_POST["title"];
	$description=$_POST["description"];
	$date=$_POST["day"].'-'.$_POST["month"].'-'.$_POST["year"];
	$prio=$_POST["priority"];
	array_push($tache, $title, $description, $date, $prio);

	//var_dump($tache);
}

//5. Nous allons écrire dans un fichier. Pour cela, il faut utiliser la fonction fopen 
//permettant d'ouvrir un fichier. 
//Nommer le fichier "data.csv", à ouvrir en mode écriture seul.
	$file = fopen("data.csv","a");


//6. Utiliser la fonction fputcsv pour enregistrer mon tableau dans le fichier
//(permet de créer le fichier en y ajoutant les données du tableau)
	fputcsv($file, $tache);

//7. Utiliser la fonction fclose afin de fermer le fichier	
	fclose($file);

//9. Donner la possibilité de supprimer une tâche ou plusieurs en même temps (checkbox)
// Aide pour la suppression :
// Récupérer dans un tableau $toutesLesTaches toutes mes tâches
// fopen
// feof
// fgetcsv
// enregitrer la tâche dans le tableau $toutesLesTaches
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

	// $toutesLesTaches = [];
	// var_dump($toutesLesTaches);

	header("Location:index.php?success=ok");
	die();

