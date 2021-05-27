<?php
if  (isset ($_POST["Login"])){


/*Connexion base jarditou*/
require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase();// Appel de la fonction de connexion

/*Démarrage session*/
session_start();

/*vérification validité des champs */

$_SESSION["Login"]=$_POST["Login"];

$passWordCheck = false;


$log=$_SESSION["Login"];
$requete2 = "SELECT * FROM users where use_log=\"$log\""; //concatenantion d'une chaine de caractère
$result2 = $db->prepare($requete2);
$result2->execute();
$nb_log=$result2->rowCount();
$result2->closeCursor();

if ($nb_log == 0) {
    $_SESSION["messlogr"] = "Ce login nous est inconnu";
    header('Location:password_reset.php');
    exit;
}

if (preg_match('#[a-zA-Z0-9]{8}#', $_POST["passWord"]))
        {if ($_POST["passWord"] != $_POST["passWord1"])
            $_SESSION["messPW"] = "Les mots de passes saisies sont différent";
        else {$_SESSION["messPW"] ="";
                $passWordCheck = true;
            }
        }
else {$_SESSION["messPW"] = "Veuillez entrer un mot de passe de 8 caractères lettre ou chiffre sans caractère spéciaux";}


if (!($passWordCheck)){
    header('Location:password_reset.php');
    exit;
}
else {
    $password_hash = password_hash($_POST["passWord"], PASSWORD_DEFAULT);
    $requete = $db->prepare("UPDATE users SET  use_mp =:use_mp WHERE use_log=:use_log");
    $requete->bindValue(':use_mp',  $password_hash);
    $requete->bindValue(':use_log', $_SESSION["Login"]);
    $requete->execute();
    //libère la connection au serveur de BDD
    $requete->closeCursor();
    $_SESSION["resetOk"]=1;
    header('Location:index.php');
    exit;
}

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
                    <img src="images/promotion.jpg"  class="w-100" alt="Image responsive" title="Image promotion"> <!--image esponsive s'adapte progressivement à la taille de l'ecran sans disparaitre-->
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
