<?php session_start();?>
<?php
if  (isset ($_SESSION["Log"])){

    if (isset ($_SESSION["adminregistration"])){
        echo' <script> alert("Inscription réussi"); </script>';
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
    <?php 
 if (file_exists("header.php") ) 
 {
      include("header.php");
 } 
 else 
 {
      // Erreur (à gérer)
      echo "file does not exist ! ";
 } ?>
    <br>
    <br>
    
    <h2 class="d-flex justify-content-center"><b>Formulaire d'inscription Administrateur</b></h2>  
        <p>Tout les champs sont obligatoires</p>
        <form name="registration" id="registration" method="post" action="authentification_admin.php">
            <div class="form-group">
                <label for="lastName"><b>Nom</b></label><input type="text" class="form-control" name="lastName" id="lastName" value="<?php if  (isset ($_SESSION["lastName"])) echo $_SESSION["lastName"];?>" placeholder="Veuillez saisir votre nom" > <!--formcontrol pour mettre la zone de saisie en dessous du titre du champs-->
                <span id="alerte-lastName" class="text-danger"><?php if  (isset ($_SESSION["messLastName"])) echo $_SESSION["messLastName"];?> </span>
                <br>
                <label for="firstName"><b>Prenom</b></label><input type="text" class="form-control" name="firstName" id="firstName" value="<?php if  (isset ($_SESSION["firstName"])) echo $_SESSION["firstName"];?>" placeholder="Veuillez saisir votre prénom" > <!--formcontrol pour mettre la zone de saisie en dessous du titre du champs-->
                <span id="alerte-firstName" class="text-danger"><?php if  (isset ($_SESSION["messFirstName"])) echo $_SESSION["messFirstName"];?></span> 
                <br>
                <label for="eMail"><b>E-mail</b></label><input type="text" class="form-control" name="eMail" id="eMail" value="<?php if  (isset ($_SESSION["eMail"])) echo $_SESSION["eMail"];?>" placeholder="Veuillez saisir votre mail" > <!--formcontrol pour mettre la zone de saisie en dessous du titre du champs-->
                <span id="alerte-lastName"class="text-danger"> <?php if  (isset ($_SESSION["messEMail"])) echo $_SESSION["messEMail"];?> </span>
                <br>
                <label for="Login"><b>Login</b></label><input type="text" class="form-control" name="Login" id="Login" value="<?php if  (isset ($_SESSION["Login"])) echo $_SESSION["Login"];?>" placeholder="Veuillez choisir un login de connexion de 6 caractères minimum" > <!--formcontrol pour mettre la zone de saisie en dessous du titre du champs-->
                <span id="alerte-login" class="text-danger"><?php if  (isset ($_SESSION["messLogin"])) echo $_SESSION["messLogin"];?> </span>
                <br>
                <label for="passWord"><b>Mot de passe</b></label><input type="text" class="form-control" name="passWord" id="passWord" placeholder="Veuillez choisir un mot de passe de connexion de 8 caractères" > <!--formcontrol pour mettre la zone de saisie en dessous du titre du champs-->
                <span id="alerte-passWord"> </span>
                <br>
                <label for="passWord1"><b>Mot de passe</b></label><input type="text" class="form-control" name="passWord1" id="passWord1" placeholder="Veuillez confirmer vôtre mot de passe de connexion" > <!--formcontrol pour mettre la zone de saisie en dessous du titre du champs-->
                <span id="alerte-passWord1" class="text-danger"><?php if  (isset ($_SESSION["messPW"])) echo $_SESSION["messPW"]; ?> </span>
                <br>
            </div>
            <div class="d-flex justify-content-center" name = "resgistrationaction">
                <button class="btn btn-dark" type="submit" name="submit" id ="submit" value="1" required>Inscription</button>
                <button class="btn btn-dark ml-2 mr-2" type="button" id="cancel">Annuler</button>
            </div>
        </form>
        <a  class="btn" href="home.php"><button class="btn-dark">Retour</button></a>

    <br>
    <br>
    <?php 
 if (file_exists("footer.php") ) 
 {
      include("footer.php");
 } 
 else 
 {
      // Erreur (à gérer)
      echo "file does not exist ! ";
 } ?>
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
                     document.getElementById("registration").reset();
              }
     }
</script>';

echo'
<script>
     document.querySelector("#submit").onclick= function(){
           if(confirm("êtes-vous sur(e) de vouloir vous inscrire?")){
                     document.getElementById("registration").post();
              }
     }
</script>';

/*Detruction session pour réactualisation de la page */

$_SESSION["lastName"]="";
$_SESSION["firstName"]="";
$_SESSION["Login"]="";
$_SESSION["eMail"]="";
$_SESSION["messLastName"] = "";
$_SESSION["messFirstName"] = "";
$_SESSION["messEMail"] = "";
$_SESSION["messLogin"] = "";
$_SESSION["messPW"]="";
$_SESSION["messlog1"]="";
$_SESSION["messlog2"]="";
$_SESSION["messlog3"]="";
$_SESSION["adminregistration"]="";

unset($_SESSION["lastName"]);
unset($_SESSION["firstName"]);
unset($_SESSION["Login"]);
unset($_SESSION["eMail"]);
unset($_SESSION["messLastName"]);
unset($_SESSION["messFirstName"]);
unset($_SESSION["messEMail"]);
unset($_SESSION["messLogin"]);
unset($_SESSION["messPW"]);
unset($_SESSION["messlog1"]);
unset($_SESSION["messlog2"]);
unset($_SESSION["messlog3"]);

unset($_SESSION["adminregistration"]);

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
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        </body>
        </html>
        
       <?php } ?>