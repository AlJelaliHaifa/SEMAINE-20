<?php
// On ouvre le fichier moncompteurjarditou.txt lecture ecriture pointeur au début
$file = fopen("compteur_jarditou.txt","r+");
// on lit le nombre indiqué dans ce fichier dans la variable
$guess = fgets($file,255);
// on ajoute 1 au nombre de visiteurs
$guess++;
// on se positionne au début du fichier
fseek($file,0);
// on écrit le nouveau nombre dans le fichier
fputs($file,$guess);
// on referme le fichier moncompteur.txt
fclose($file);
// on indique sur la page le nombre de visiteurs
//print("$guess personnes sont passées par ici");
?>
