<?php 

session_start();
$log=$_POST['login'];
$password =$_POST['passWord'];
echo $log;
echo $password;


if( $log == $_SESSION['login'] && $password == $_SESSION['passWord']){
    header('Location:help.php');
    exit;
    }
else{header('Location:formulaire_connexion.php?erreur=1');
    exit;
}

?>