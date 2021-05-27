<?php session_start();?>
<?php
if  (isset ($_SESSION["Log"])){

if (isset ($_SESSION["registration"])){
    echo' <script> alert("Votre demande a été prise en compte"); </script>';
}


?>


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
    
    <?php include 'header/header_contact.php'; ?>

        <p id="contact"></p>
        <h1><b>Vos Coordonées</b></h1>  
        <p>*Ces zones sont obligatoires</p>
        <form name="formulaire" id="formulaire" method="post" action="contact_script.php"> 
            <div class="form-group">
                <label for="lastName"><b>Nom*</b></label><input type="text" class="form-control" name="lastName" id="lastName"  value="<?php if  (isset ($_SESSION["lastName"])) echo $_SESSION["lastName"];?>" placeholder="Veuillez saisir votre nom" > 
                <span id="alert-lastName" class="text-danger"><?php if  (isset ($_SESSION["messLastName"])) echo $_SESSION["messLastName"];?> </span>
                <br>
                <label for="firstName"><b>Prénom*</b></label><input type="text" class="form-control" name="firstName" id="firstName"   value="<?php if  (isset ($_SESSION["firstName"])) echo $_SESSION["firstName"];?>" placeholder="Veuillez saisir votre prénom">
                <span id="alert-firstName" class="text-danger"><?php if  (isset ($_SESSION["messFirstName"])) echo $_SESSION["messFirstName"];?> </span>
            </div>
            
            <b>sexe*&nbsp</b>
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="sex"><input class="form-check-input" type="radio" name="sex" id="sexe1" value="F" <?php if (isset($_SESSION["sex"]) and $_SESSION["sex"] == 'F') echo "checked"; ?>>Féminin</label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="sex"><input class="form-check-input" type="radio" name="sex" id="sexe2" value="M" <?php if (isset($_SESSION["sex"]) and $_SESSION["sex"] == 'M') echo "checked"; ?>>Masculin</label>
            </div>
            <br>
            <span id="alert-sex" class="text-danger"><?php if  (isset ($_SESSION["messSex"])) echo $_SESSION["messSex"];?> </span>
            <br>
            
            <div class="form-group">
                <label for="date"><b>Date de naissance*</b></label><input type="text" class="form-control" name="date" id="date"  value="<?php if  (isset ($_SESSION["date"])) echo $_SESSION["date"];?>"  placeholder="Veuillez saisir votre date de naissance">
                <span id="alert-date" class="text-danger"><?php if  (isset ($_SESSION["messDate"])) echo $_SESSION["messDate"];?> </span>
                <br>
                <label for="postalCode"><b>Code postal*</b></label><input type="number" class="form-control" name="postalCode" id="postalCode"  value="<?php if  (isset ($_SESSION["postalCode"])) echo $_SESSION["postalCode"];?>"  placeholder="Veuillez saisir votre code postal">
                <span id="alert-postalCode" class="text-danger"><?php if  (isset ($_SESSION["messPostalCode"])) echo $_SESSION["messPostalCode"];?> </span>
                <br>
                <label for="adress"><b>Adresse*</b></label><input type="text" class="form-control" name="adress" id="adress"  value="<?php if  (isset ($_SESSION["adress"])) echo $_SESSION["adress"];?>"  placeholder="Veuillez saisir votre adresse">
                <span id="alert-adress" class="text-danger"><?php if  (isset ($_SESSION["messAdress"])) echo $_SESSION["messAdress"];?> </span>
                <br>
                <br>
                <label for="city"><b>Ville*</b></label><input type="text" class="form-control" name="city" id="city"  value="<?php if  (isset ($_SESSION["city"])) echo $_SESSION["city"];?>"  placeholder="Veuillez saisir votre ville">
                <span id="alert-city" class="text-danger"><?php if  (isset ($_SESSION["messCity"])) echo $_SESSION["messCity"];?> </span>
                <br>
                <br>
                <label for="eMail"><b>Email*</b></label><input type="email" class="form-control" name="eMail" id="eMail"  value="<?php if  (isset ($_SESSION["eMail"])) echo $_SESSION["eMail"];?>" placeholder="date.loper@afpa.fr" >
                <span id="alert-eMail" class="text-danger"><?php if  (isset ($_SESSION["messEMail"])) echo $_SESSION["messEMail"];?> </span>
                <br>
                <br>
            </div>
            <h1><b>Votre demande</b></h1>
                <label for="subject">Sujet</label>
                <select class="form-control" name="subject" id="subject">
                    <option value = 0  <?php if (isset($_SESSION["subject"]) and $_SESSION["subject"] == 0) echo "selected"; ?>>Veuillez séléctionner un sujet</option>
                    <option value = 1 <?php if (isset($_SESSION["subject"]) and $_SESSION["subject"] == 1) echo "selected"; ?>>Mes commandes</option>
                    <option value = 2 <?php if (isset($_SESSION["subject"]) and $_SESSION["subject"] == 2) echo "selected"; ?>>Question sur un produit</option>
                    <option value = 3 <?php if (isset($_SESSION["subject"]) and $_SESSION["subject"] == 3) echo "selected"; ?>>Réclamations</option>
                    <option value = 4 <?php if (isset($_SESSION["subject"]) and $_SESSION["subject"] == 4) echo "selected"; ?>>Autres</option>
                </select> 
                <span id="alert-subject" class="text-danger"><?php if  (isset ($_SESSION["messSubject"])) echo $_SESSION["messSubject"];?> </span>
                <br>
                <p>Votre question*:</p>
                <textarea for="question" name="question" class="form-control ml-1 row col-12 col-sm-12" id="question" rows="3"><?php if  (isset ($_SESSION["question"])) echo $_SESSION["question"];?></textarea>
                <span id="alert-question" class="text-danger"><?php if  (isset ($_SESSION["messQuest"])) echo $_SESSION["messQuest"];?> </span>
                <br>
                <br>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox"  id="accept" required>
                    <label class="form-check-label" for="accept">J'accepte le traitement informatique de ce formulaire</label>
                </div>
            </div>
            <button class="btn btn-dark" type="submit" name="submit" value="1" >Envoyer</button>
            <button class="btn btn-dark" type="button" id="cancel">Annuler</button>
        </form>
        <br>
       
        <?php include 'Footer/footer.php'; ?>
    </div>



<!--fichiers Javascript nécessaires à Bootstrap-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

<?php

echo'
<script>
     document.querySelector("#efface").onclick= function(){
           if(confirm("êtes-vous sur(e) de vouloir effacer?")){
                     document.getElementById("formulaire").reset();
              }
     }
</script>';

$_SESSION["lastName"]="";
$_SESSION["firstName"]="";
$_SESSION["sex"]="";
$_SESSION["date"]="";
$_SESSION["postalCode"]="";
$_SESSION["adress"]="";
$_SESSION["city"]="";
$_SESSION["eMail"]="";
$_SESSION["subject"]="";
$_SESSION["question"]="";
$_SESSION["messLastName"]="";
$_SESSION["messFirstName"]="";
$_SESSION["messSex"]="";
$_SESSION["messDate"]="";
$_SESSION["messPostalCode"]="";
$_SESSION["messAdress"]="";
$_SESSION["messCity"]="";
$_SESSION["messEMail"]="";
$_SESSION["messSubject"]="";
$_SESSION["messQuest"]="";

$_SESSION["registration"]="";



unset($_SESSION["lastName"]);
unset($_SESSION["firstName"]);
unset($_SESSION["sex"]);
unset($_SESSION["date"]);
unset($_SESSION["postalCode"]);
unset($_SESSION["adress"]);
unset($_SESSION["city"]);
unset($_SESSION["eMail"]);
unset($_SESSION["subject"]);
unset($_SESSION["question"]);
unset($_SESSION["messLastName"]);
unset($_SESSION["messFirstName"]);
unset($_SESSION["messSex"]);
unset($_SESSION["messDate"]);
unset($_SESSION["messPostalCode"]);
unset($_SESSION["messAdress"]);
unset($_SESSION["messCity"]);
unset($_SESSION["messEMail"]);
unset($_SESSION["messSubject"]);
unset($_SESSION["messQuest"]);

unset($_SESSION["registration"]);


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