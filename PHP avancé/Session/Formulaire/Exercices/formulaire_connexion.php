<?php
session_start();

$_SESSION["login"]="aljelali.haifa@gmail.com";
$_SESSION["passWord"]="salamNes2922";

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
        <form name="formulaire" id="formulaire" method="post" action="verification.php">
            <div class="form-group">
                <label for="login"><b>Login</b></label><input type="courriel" class="form-control" name="login" id="login"  placeholder="date.loper@afpa.fr">
                <label for="passWord"><b>Mot de passe</b></label><input type="text" class="form-control" name="passWord" id="passWord">
            </div>
            <button class="btn btn-dark" type="submit" name="submit" value="1" required>CONNEXION</button>
        </form>
<br>
<br>
<?php
    if (isset ($_GET["erreur"])){
           echo "<h1 class='d-flex justify-content-center'>"."La connexion a échoué"."</h1>";
    }
        
?>
    </div>
</body>
</html>