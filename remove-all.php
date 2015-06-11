<?php

//Ouvrir le fichier en le remettant à 0
//Fermer le fichier
//Redirection

$file = fopen("data.csv","w");
fclose($file);

header("Location:index.php?deleteall=ok");
die();