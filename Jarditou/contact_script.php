<?php session_start();?>
<?php
if  (isset ($_SESSION["Log"])){

/*Démarrage session*/
session_start();

/*vérification validité des champs */

$_SESSION["lastName"]=$_POST["lastName"];
$_SESSION["firstName"]=$_POST["firstName"];
$_SESSION["date"]=$_POST["date"];
$_SESSION["postalCode"]=$_POST["postalCode"];
$_SESSION["adress"]=$_POST["adress"];
$_SESSION["city"]=$_POST["city"];
$_SESSION["eMail"]=$_POST["eMail"];
$_SESSION["subject"]=$_POST["subject"];
$_SESSION["question"]=$_POST["question"];

$lastNameCheck = $firstNameCheck = $sexCheck = $dateCheck = $postalCodeCheck = $adressCheck = $cityCheck = $eMailCheck = $subjectCheck = $questionCheck =  false;

if (preg_match('#[a-zA-Z]+#', $_SESSION["lastName"]))
    {$_SESSION["messLastName"] = "";
     $lastNameCheck = true;
    }
else  $_SESSION["messLastName"] = "Veuillez entrer un nom valide";


if (preg_match('#[a-zA-Z]+#', $_SESSION["firstName"]))
    {$_SESSION["messFirstName"] = "";
     $firstNameCheck = true;
    }
else  $_SESSION["messFirstName"] = "Veuillez entrer un prénom valide";

if (isset($_POST['sex']) and ($_POST['sex'] == 'M')){
    $_SESSION["messSex"] = "";
    $_SESSION["sex"] = $_POST['sex'];
    $sexCheck = true;
}
else { 
    if (isset($_POST['sex']) and ($_POST['sex'] == 'F')){
        $_SESSION["messSex"] = "";
        $_SESSION["sex"] = $_POST['sex'];
        $sexCheck = true;
    }
    else {
        $_SESSION["messSex"] = "Veuillez renseigner votre sexe";
    }
}


if (preg_match('#[0-9]{2}\/[0-9]{2}\/[0-9]{4}#', $_SESSION["date"]))
    {$_SESSION["messDate"] = "";
    $dateCheck = true;
    }
else  $_SESSION["messDate"] = "Veuillez entrer une date de naissance valide";


if (preg_match('#[0-9]{5}#', $_SESSION["postalCode"]))
    {$_SESSION["messPostalCode"] = "";
     $postalCodeCheck = true;
    }
else  $_SESSION["messPostalCode"] = "Veuillez entrer un code postal valide";


if (preg_match('#[1-9]+ .+#', $_SESSION["adress"]))
    {$_SESSION["messAdress"] = "";
    $adressCheck = true;
    }
else  $_SESSION["messAdress"] = "Veuillez entrer une adresse valide";


if (preg_match('#[a-zA-Z]{1}[a-z]*#', $_SESSION["city"]))
    {$_SESSION["messCity"] = "";
    $cityCheck = true;
    }
else  $_SESSION["messCity"] = "Veuillez entrer une ville valide";


if (preg_match('#[_a-z0-9-]+(.\[_a-z0-9-]+)*@[a-z]+\.[a-z]{2,3}#', $_SESSION["eMail"]))
    {$_SESSION["messEMail"] = "";
    $eMailCheck = true;
    }
else  $_SESSION["messEMail"] = "Veuillez entrer un email valide";



if ($_SESSION['subject'] == 0){
    $_SESSION["messsubject"] = "Veuiller sélectionner un sujet";
}
if ($_SESSION['subject'] == 1){
    $_SESSION["messsubject"] = "";
    $subjectCheck = true;
}
if ($_SESSION['subject'] == 2){
    $_SESSION["messsubject"] = "";
    $subjectCheck = true;
}
if ($_SESSION['subject'] == 3){
    $_SESSION["messsubject"] = "";
    $subjectCheck = true;
}
if ($_SESSION['subject'] == 4){
    $_SESSION["messsubject"] = "";
    $subjectCheck = true;
}



if (preg_match('#.+#', $_SESSION["question"]))
    {$_SESSION["messQuest"] = "";
    $questionCheck  = true;
    }
else  $_SESSION["messQuest"] = "Veuillez saisir une question";




if (!($lastNameCheck and $firstNameCheck and $sexCheck and $dateCheck and $postalCodeCheck and $adressCheck and $cityCheck and $eMailCheck and $subjectCheck and $questionCheck )){
    header('Location:contact.php');
    exit;
}
else {
    $_SESSION["contactresgistration"]= "ok";
    $_SESSION["lastName"]="";
    $_SESSION["firstName"]="";
    $_SESSION["Sexe"]="";
    $_SESSION["date"]="";
    $_SESSION["postalCode"]="";
    $_SESSION["adress"]="";
    $_SESSION["city"]="";
    $_SESSION["eMail"]="";
    $_SESSION["subject"]="";
    $_SESSION["question"]="";
    $_SESSION["messNom"]="";
    $_SESSION["messFirstName"]="";
    $_SESSION["messSexe"]="";
    $_SESSION["messDate"]="";
    $_SESSION["messPostalCode"]="";
    $_SESSION["messAdress"]="";
    $_SESSION["messCity"]="";
    $_SESSION["messEMail"]="";
    $_SESSION["messsubject"]="";
    $_SESSION["messQuest"]="";
   

    unset($_SESSION["lastName"]);
    unset($_SESSION["firstName"]);
    unset($_SESSION["Sexe"]);
    unset($_SESSION["date"]);
    unset($_SESSION["postalCode"]);
    unset($_SESSION["adress"]);
    unset($_SESSION["city"]);
    unset($_SESSION["eMail"]);
    unset($_SESSION["subject"]);
    unset($_SESSION["question"]);
    unset($_SESSION["messNom"]);
    unset($_SESSION["messFirstName"]);
    unset($_SESSION["messSexe"]);
    unset($_SESSION["messDate"]);
    unset($_SESSION["messPostalCode"]);
    unset($_SESSION["messAdress"]);
    unset($_SESSION["messCity"]);
    unset($_SESSION["messEMail"]);
    unset($_SESSION["messsubject"]);
    unset($_SESSION["messQuest"]);
   
    
    header('Location:contact.php');
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