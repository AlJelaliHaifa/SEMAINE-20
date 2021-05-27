<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr"> 

<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0",shrink-to-fit=no>
    <title>Réinitialisation mot de passe</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container"> 
        <div class="row"> 
            <div class="col-6"> 
                
                <img src="images/jarditou_logo.jpg"  class="d-none d-md-block w-50 mt-2" alt="Image responsive" title="Image logo">
            </div>
            <div class="col-6">
                
                <h2 class="d-none d-md-block display-6 float-right mr-5 mt-3">Tout le jardin</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <img src="images/promotion.jpg"  class="w-100" alt="Image responsive" title="Image promotion"> 
            </div>
        </div>
    <br>
    <br>
    <h2 class="d-flex justify-content-center"><b>Réinisialisation mot de passe :</b></h2> 
        <form name="inscription" id="inscription" method="post" action="reset_script.php">
            <div class="form-group">
                <label for="Login"><b>Veuillez saisir vôtre login</b></label><input type="text" class="form-control" name="Login" id="Login" value="<?php if  (isset ($_SESSION["Login"])) echo $_SESSION["Login"];?>"> <!--formcontrol pour mettre la zone de saisie en dessous du titre du champs-->
                <span id="alert-login" class="text-danger"><?php if  (isset ( $_SESSION["messLogReset"])) echo  $_SESSION["messLogReset"];?> </span>
                <br>
                <label for="password"><b>Mot de passe</b></label><input type="text" class="form-control" name="password" id="password" placeholder="Veuillez choisir un mot de passe de connexion de 8 caractères" > <!--formcontrol pour mettre la zone de saisie en dessous du titre du champs-->
                <span id="alert-password"> </span>
                <br>
                <label for="password1"><b>Confirmer mot de passe</b></label><input type="text" class="form-control" name="password1" id="password1" placeholder="Veuillez confirmer vôtre mot de passe de connexion" > <!--formcontrol pour mettre la zone de saisie en dessous du titre du champs-->
                <span id="alert-password1" class="text-danger"><?php if  (isset ($_SESSION["messPassWord"])) echo $_SESSION["messPassWord"]; ?> </span>
                <br>
            </div>
            <div class="d-flex justify-content-center" name = "authencationAction">
                <button class="btn btn-primary" type="submit" name="submit2" id ="submit2" value="1" required>Réinitialiser</button>
                <a  class="btn btn-success ml-2" href="index.php">Retour</a>
            </div>
        </form>
    <br>
    <div class="row">
     <div class="col-12">
        <nav class="d-flex justify-content-center navbar navbar-expand-sm bg-dark navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
            </button> 
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="">mention légales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">horaires</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">plan du site</a>
                    </li>
                </ul>
            </div> 
        </nav>
    </div>
</div>

</div>
        
<!--fichiers Javascript nécessaires à Bootstrap-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

<?php  

$_SESSION["messLogReset"] ="";
$_SESSION["messPassWord"]="";
$_SESSION["Login"]="";
unset($_SESSION["messLogReset"]);
unset($_SESSION["messPassWord"]);
unset($_SESSION["Login"]);

session_destroy();

?>