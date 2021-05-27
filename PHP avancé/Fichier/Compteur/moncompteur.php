<?php

// On ouvre le fichier moncompteur.txt lecture ecriture pointeur au début
$file = fopen("compteur.txt","r+");

// on lit le nombre indiqué dans ce fichier dans la variable
$guess = fgets($file,255);

// on ajoute 1 au nombre de visiteur
$guess++;

// on se positionne au début du fichier
fseek($file,0);

// on écrit le nouveau nombre dans le fichier
fputs($file,$guess);

// on referme le fichier moncompteur.txt
fclose($file);

// on indique sur la page le nombre de visiteur
print("$guess personnes sont passées par ici");
?>
