<?php

echo "<h1>Affichage des informations saisie dans le formulaire</h1><br>";

$lastNameCheck = $firstNameCheck = $sexCheck = $dateCheck =  $postalCodeCheck = $adressCheck = $eMailCheck =  $questCheck = $cityCheck = $subjectCheck = false;

// NOM
if (!(empty($_POST["lastName"]))){
    echo "<h4>Nom saisie : ".$_POST['lastName']."</h4>";
    if (preg_match('#[A-Z]{1}[a-z]*#', $_POST["lastName"]))
        {$lastNameCheck = true;}
    }
else{
    echo "<h4>Nom saisie : Aucun</h4>";
} 
//Prenom
if (!(empty($_POST["firstName"]))){
    echo "<h4>Prénom saisie : ".$_POST['firstName']."</h4>";
    if (preg_match('#[A-Z]{1}[a-z]*#', $_POST["firstName"]))
        {$firstNameCheck = true;}
    }
else{
    echo "<h4>Prénom saisie : Aucun</h4>";
} 

//Sexe
if(isset($_POST['sex']) and ($_POST['sex']) == 'F'){
    echo "<h4>Sexe : Féminin</h4>";
    $sexCheck = true;
    }
else if (isset($_POST['sex']) and ($_POST['sex']) == 'M') {
    echo "<h4>Sexe : Masculin</h4>";
    $sexCheck = true;
    }
else {
    echo "<h4>Sexe : Non renseigné</h4>";
}  

//Date de naisance
if (!(empty($_POST["date"]))){
    echo "<h4>Date de naissance : ".$_POST['date']."</h4>";
    if (preg_match('#[0-9]{2}\/[0-9]{2}\/[0-9]{4}#', $_POST["date"]))
        {$dateCheck = true;}
    }
else{
    echo "<h4>Date de naissance : Aucune</h4>";
} 

//Code postal
if (!(empty($_POST["postalCode"]))){
    echo "<h4>Code Postal : ".$_POST['postalCode']."</h4>";
    if (preg_match('#[0-9]{5}#', $_POST["postalCode"]))
        {$postalCodeCheck = true;}
    }
else{
    echo "<h4>Code Postal : Aucun";
} 

//Adresse
if (!(empty($_POST["adress"]))){
    echo "<h4>Adresse : ".$_POST['adress']."</h4>";
    if (preg_match('#[1-9]+ .*#', $_POST["adress"]))
        {$adressCheck = true;}
    }
else{
    echo "<h4>Adresse : Aucune";
} 

//Ville
if (!(empty($_POST["city"]))){
    echo "<h4>Ville : ".$_POST['city']."</h4>";
    if (preg_match('#[A-Z]{1}[a-z]*#', $_POST["city"]))
        {$adressCheck = true;}
    }
else{
    echo "<h4>Ville : Aucune";
} 

//Mail
if (!(empty($_POST["eMail"]))){
    echo "<h4>Email : ".$_POST['eMail']."</h4>";
    if (preg_match('#[_a-z0-9-]+(.\[_a-z0-9-]+)*@[a-z]+\.[a-z]{2,3}#', $_POST["eMail"]))
        {$eMailCheck = true;}
    }
else{
    echo "<h4>Email : Aucun";
}

//Sujet
if (!(empty($_POST["subject"]))){
    if (($_POST['subject']) == "1") {echo "<h4>Sujet : "."Mes Commandes"."</h4>";}
    if (($_POST['subject']) == "2") {echo "<h4>Sujet : "."Question sur un produit"."</h4>";}
    if (($_POST['subject']) == "3") {echo "<h4>Sujet : "."Réclamations"."</h4>";}
    if (($_POST['subject']) == "4") {echo "<h4>Sujet : "."Autres"."</h4>";}
    $subjectCheck = true;
    }
else{
    echo "<h4>Sujet : Aucun";
} 

//Commentaire
if (!(empty($_POST["question"]))){
    echo "<h4>Commentaire : ".$_POST['question']."</h4>";
    if (preg_match('#.+#', $_POST["question"]))
    {$questCheck = true;}
    }
else{
    echo "<h4>Commentaire : Aucun";
} 


if ($lastNameCheck == true and $firstNameCheck == true and $sexCheck == true and $dateCheck == true and $postalCodeCheck == true and $adressCheck == true and $eMailCheck == true and 
    $questCheck == true and $subjectCheck == true)
 {echo ' <script> window.alert("Demande enregistré"); </script>';
    header("Location: formulaire.php");}
