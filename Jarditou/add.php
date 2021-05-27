<?php session_start();?>
<?php
if  (isset ($_SESSION["Log"])){?>
<!DOCTYPE html>
    <html lang="fr">
    
    <head>
        <meta charset="UTF-8">
        <title>Ajout produit</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0",shrink-to-fit=no>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <?php    
        require "connexion_bdd.php"; // Inclusion de notrebibliothèque de fonctions

        $db = connexionBase(); // Appel de la fonction deconnexion
        $requete = "SELECT * FROM categories";

        $result = $db->query($requete);

        // Renvoi de l'enregistrement sous forme d'un objet
        $categorie = $result->fetch(PDO::FETCH_OBJ);
       ?>
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



            <h1><b>Ajout d'un produit</b></h1>  
    <form name="productAdd" id="productAdd" method="post" action="add_script.php" enctype="multipart/form-data">
        <label for="cat_id"><b>Nom catégorie<b></label>
        <select class="form-control" name="cat_nom" id="cat_nom">
             <?php
                 while ($row = $result->fetch(PDO::FETCH_OBJ)){
                     echo"<option value=".$row->cat_id.">".$row->cat_nom."</option>";
                     }
            ?>
        </select>
        <div class="form-group">
            <label for="pro_ref"><b>Réference produit</b></label><input type="text" class="form-control" name="pro_ref" id="pro_ref">
            <label for="pro_libelle"><b>Libéllé produit</b></label><input type="text" class="form-control" name="pro_libelle" id="pro_libelle">
            <label for="pro_description"><b>Description produit</b></label><input type="text" class="form-control" name="pro_description" id="pro_description">
            <label for="pro_prix"><b>Prix</b></label><input type="number" class="form-control" name="pro_prix" id="pro_prix">
            <label for="pro_stock"><b>Quantité en stock</b></label><input type="number" class="form-control" name="pro_stock" id="pro_stock">
            <label for="pro_couleur"><b>Couleur Produit</b></label><input type="text" class="form-control" name="pro_couleur" id="pro_couleur">
            <label for="pro_photo"><b>Extension de la photo :</b></label>
                                <select class="form-control" name="pro_photo" id="pro_photo">
                                     <option>jpg</option>
                                     <option>png</option>
                                     <option>gif</option>
                                </select>
        </div>      
        <b>Produit bloqué<b>
        <div class="form-check form-check-inline">
             <label class="form-check-label" for="pro_bloque"><input class="form-check-input" type="radio" name="pro_bloque" id="pro_bloque1" value=1>bloque</label>
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label" for="pro_bloque"><input class="form-check-input" type="radio" name="pro_bloque" id="pro_bloque2" value=0>Non bloque</label>
        </div>
        <br>
        <br>
        <label for="pro_d_ajout"><b>Date d'ajout :</b></label><input type="text" class="form-control" name="pro_d_ajout" id="pro_d_ajout" value='<?php echo date("yy-m-d");?>' Readonly>
        <br>
        <label for="File">Photo :</label>
        <br>
        
        <input type="file" name="File"> 
        <br>
        <br>
        <span id="alert-field" class="text-danger"><?php if  (isset ($_SESSION["field"])) echo $_SESSION["messField"];?> </span>
        <br>
         <span id="alert-dig" class="text-danger"><?php if  (isset ($_SESSION["digital"])) echo $_SESSION["messDigital"];?> </span>
        <br>
        <span id="alert-ref" class="text-danger"><?php if  (isset ($_SESSION["ref"])) echo $_SESSION["messref"];?> </span>
        <br>
        <span id="alert-file" class="text-danger"><?php if  (isset ($_SESSION["Files"])) echo $_SESSION["messFiles"];?> </span>
        <br>
        <div class="d-flex justify-content-center" name = "productAction">
            <button class="btn btn-primary" type="submit" name="submit" value="1" onclick="verif();">Envoyer</button>
            <a href="table_admin.php" class="btn btn-success ml-1" type="button" id="cancel">Annuler</a>
        </div>
    </form>

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


<script>

    //vérifie si on envoit ou non le formulaire à "script_modif.php"
    function verif(){ 
        //Rappel : confirm() -> Bouton OK et Annuler, renvoit true ou false
        var resultat = confirm("Etes-vous certain de vouloir ajouter cet enregistrement ?");

        //alert("retour :"+ resultat);

        if (resultat==false){
            alert("Vous avez annulé l'enregistrement' \nAucun nouveau produit n'a été ajouté");
            //annule l'évènement par défaut ... SUBMIT vers "script_modif.php"
            event.preventDefault();    
        }
    }
</script>
       
       
</div>




<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
    </html>


<?php }

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

<?php

    $_SESSION["field"] = "";
     $_SESSION["messField"]="";
     $_SESSION["digital"]="";
     $_SESSION["messDigital"] = "";
     $_SESSION["ref"] = "";
     $_SESSION["messref"] = "";
     $_SESSION["Files"] = "";
     $_SESSION["messFiles"] = "";
 
 
     unset($_SESSION["field"]);
     unset($_SESSION["messField"]);
     unset($_SESSION["digital"]);
     unset($_SESSION["messDigital"]);
     unset($_SESSION["ref"]);
     unset($_SESSION["messref"]);
     unset($_SESSION["Files"]);
     unset($_SESSION["messFiles"]);

?>