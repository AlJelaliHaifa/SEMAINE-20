<?php
session_name("Afpa");
session_id("0000");
session_start();
echo"- session ID : ".session_id();

echo "<br>";

$_SESSION["login"] = "haifa";
$_SESSION["role"] = "admin";

echo $_SESSION["login"];
echo "<br>";
echo $_SESSION["role"];

var_dump($_SESSION);

echo"- session ID : ".session_id();
echo "<br>";

//Test si autentification par 2 méthodes
//Méthode 1
if ($_SESSION["login"]) 
{
   echo"Vous êtes autorisé à voir cette page.";  
} 
else 
{
   echo"Cette page nécessite une identification.";  
}


//Méthode 2

if (! isset($_SESSION["login"]) ) 
{
    header("Location:pageredirectionsessionout.php");
    exit;
}
echo "<br>";
// Reste du code (PHP/HTML)
echo"Bonjour ".$_SESSION["login"]."<br>";  


//NOM session

echo"- Nom de la session : ".session_name();


//Destruction de session
//suppression des variables de session.
unset($_SESSION["login"]);
unset($_SESSION["role"]);

// via la fonction setcookie(), on fait expirer en termes de date le cookie qui concerne le nom de la session. Ceci n’est valide que dans le cas où les sessions sont gérées par cookies (comportement par défaut de PHP), d’où la condition
if (ini_get("session.use_cookies")) 
{
    setcookie(session_name(), '', time()-1);
}
//la fonction session_destroy() détruit le reste de la session.
session_destroy();

//Test session qui renvoie vide
var_dump($_SESSION);

?>