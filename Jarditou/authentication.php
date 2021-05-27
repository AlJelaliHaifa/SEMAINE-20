<?php
if  (isset ($_POST["lastName"])){


/*Connexion base jarditou*/
require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase();// Appel de la fonction de connexion

/*Démarrage session*/
session_start();

/*vérification validité des champs */

$_SESSION["lastName"]=$_POST["lastName"];
$_SESSION["firstName"]=$_POST["firstName"];
$_SESSION["Login"]=$_POST["Login"];
$_SESSION["eMail"]=$_POST["eMail"];

$lastNameCheck = $firstNameCheck = $loginCheck = $eMailCheck = $passWordCheck = false;


if (preg_match('#[a-z]+#', $_SESSION["lastName"]))
    {$_SESSION["messLastName"] = "";
     $lastNameCheck = true;
    }
else  $_SESSION["messLastName"] = "Veuillez entrer un nom valide";

if (preg_match('#[a-z]+#', $_SESSION["firstName"]))
    {$_SESSION["messFirstName"] = "";
     $firstNameCheck = true;
    }
else  $_SESSION["messFirstName"] = "Veuillez entrer un prénom valide";

if (preg_match('#[_a-z0-9-]+(.\[_a-z0-9-]+)*@[a-z]+\.[a-z]{2,3}#', $_SESSION["eMail"]))
    {$_SESSION["messEMail"] = "";
    $eMailCheck = true;
    }
else  $_SESSION["messEMail"] = "Veuillez entrer un Mail valide";

if (preg_match('#[a-zA-Z0-9]{6}[a-zA-Z0-9]*#', $_SESSION["Login"]))
    {$_SESSION["messLogin"] = "";
    $loginCheck = true;
    }
else  $_SESSION["messLogin"] = "Veuillez entrer un Login d'au moins 6 caractères lettre ou chiffre sans caractère spéciaux";

if (preg_match('#[a-zA-Z0-9]{8}#', $_POST["passWord"]))
        {if ($_POST["passWord"] != $_POST["passWord1"])
            $_SESSION["messPW"] = "Les mots de passes saisies sont différent";
        else {$_SESSION["messPW"] ="";
                $passWordCheck = true;
            }
        }
else {$_SESSION["messPW"] = "Veuillez entrer un mot de passe de 8 caractères lettre ou chiffre sans caractère spéciaux";}




if (!($lastNameCheck and $firstNameCheck and $loginCheck and $eMailCheck and $passWordCheck)){
    header('Location:index.php');
    exit;
}

/*Vérification existance du mail */

$mail=$_SESSION["eMail"];
$requete2 = "SELECT * FROM users where use_mail=\"$mail\""; //concatenantion d'une chaine de caractère
$result2 = $db->prepare($requete2);
$result2->execute();
$numbEMail=$result2->rowCount();
$result2->closeCursor();

if ($numbEMail != 0) {
        $_SESSION["messEMail"] = "Ce Mail existe déjà";
        header('Location:index.php');
        exit;
}

/*Vérification existance du login */

$log=$_SESSION["Login"];
$requete1 = "SELECT * FROM users where use_log=\"$log\""; //concatenantion d'une chaine de caractère
$result1 = $db->prepare($requete1);
$result1->execute();
$numbLog=$result1->rowCount();
$result1->closeCursor();

if ($numbLog != 0) {
        $_SESSION["messLogin"] = "Ce login existe déjà";
        header('Location:index.php');
        exit;
}

 /*Insertion nouvel utilisateur*/
    $dateIns = date("y-m-d");
    $dateCo = NULL;
    $passWordHash = password_hash($_POST["passWord"], PASSWORD_DEFAULT);
    $status = 0;


    $requete = $db->prepare("INSERT INTO users (use_nom,use_prenom,use_mail,use_log,use_mp,use_d_ins,use_d_dercon,use_status) 
                        values(:use_nom,:use_prenom,:use_mail,:use_log,:use_mp,:use_d_ins,:use_d_dercon,:use_status)");
    $requete->bindValue(':use_nom', $_SESSION["lastName"]);
    $requete->bindValue(':use_prenom', $_SESSION["firstName"]);
    $requete->bindValue(':use_mail', $_SESSION["eMail"]);
    $requete->bindValue(':use_log', $_SESSION["Login"]);
    $requete->bindValue(':use_mp',  $passWordHash);
    $requete->bindValue(':use_d_ins', $dateIns);
    $requete->bindValue(':use_d_dercon', $dateCo);
    $requete->bindValue(':use_status', $status);


$requete->execute();

//libère la connection au serveur de BDD
$requete->closeCursor();

//Envoie Mail inscription


$message = "<!DOCTYPE html>
<html lang='fr'> 

<head>
   
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0',shrink-to-fit=no>
    <title>Exemple Mail</title>
    
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>
<style>
html 
{
   font-size: 100%;
}
body 
{
    font-size: 1rem; /* Si html fixé à 100%, 1rem = 16px = taille par défaut de police de Firefox ou Chrome */
}
</style>  
</head>
<body>
<div class='container'>
    <div class='row'>
        <div class='col-12'>
          <h1 class='d-flex justify-content-center'>Confirmation Inscription</h1>
      </div>    
    </div> 
    <br>  
    <div class='row'>
        <div class='col-12 d-flex justify-content-center'>
          <p>Bienvenue chez Jarditou, nous sommes heureux de vous compter parmi nos membres. Vous avez désormais accès  au site Jarditou.com pour y faire vos achats</p>
      </div>    
    </div>   
</div> 
<script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
</html>";

$aHeaders = array('MIME-Version' => '1.0',
'Content-Type' => 'text/html; charset=utf-8',
'From' => 'Jarditou <contact@jarditou.fr>',
'Reply-To' => 'Service commercial <commerciaux@jarditou.com>',
'X-Mailer' => 'PHP/' . phpversion()
);

mail($_SESSION["eMail"], "Confirmation de votre inscription chez Jarditou", $message, $aHeaders);

/*Destruction session*/

$_SESSION["lastName"]="";
$_SESSION["firstName"]="";
$_SESSION["Login"]="";
$_SESSION["eMail"]="";
$_SESSION["messLastName"] = "";
$_SESSION["messFirstName"] = "";
$_SESSION["messEMail"] = "";
$_SESSION["messLogin"] = "";
$_SESSION["messPW"]="";

$_SESSION["jaja"]=1;


unset($_SESSION["lastName"]);
unset($_SESSION["firstName"]);
unset($_SESSION["Login"]);
unset($_SESSION["eMail"]);
unset($_SESSION["messLastName"]);
unset($_SESSION["messFirstName"]);
unset($_SESSION["messEMail"]);
unset($_SESSION["messLogin"]);
unset($_SESSION["messPW"]);


/*if (ini_get("session.use_cookies")) 
{
    setcookie(session_name(), '', time()-1);
}
session_destroy();*/

header('Location:index.php');
exit;

}
else  {?>
    
    <!DOCTYPE html>
    <html lang="fr"> 

    <head>
        
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0",shrink-to-fit=no>
        <title>Document Contact</title>
       
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <div class="container"> 
            <div class="row">
                <div class="col-12">
                    <img src="images/promotion.jpg"  class="w-100" alt="Image responsive" title="Image promotion"> 
                </div>
            </div>
        <?php
            echo "<h1 class='d-flex justify-content-center'>"."Vous n'êtes pas autorisé à acceder à cette page."."</h1>";
            echo "<h3 class='d-flex justify-content-center'>"."Veuillez vous inscrire ou vous authentifier."."</h3>";
            echo "<br>";
            echo "<br>";
        ?>
            <a  class="btn btn-success d-flex justify-content-center" href="index.php">Inscription/Connexion</a>
        </div>      
        
        <!--fichiers Javascript nécessaires à Bootstrap-->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        </body>
        </html>
        
       <?php } ?>