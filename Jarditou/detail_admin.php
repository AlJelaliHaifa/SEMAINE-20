  
<?php session_start();?>
<?php
if  (isset ($_SESSION["Log"])){

    
require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion

?>


<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Détail d'un produit administrateur</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0",shrink-to-fit=no>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <?php    
        
        $pro_id = $_GET["pro_id"];
        $request = "SELECT * FROM produits join categories on cat_id = pro_cat_id WHERE pro_id=".$pro_id; //concatenation differente en sql si l'element concaténé est une chaine, voir scrit ajout et modif

        $result = $db->query($request);

        // Renvoi de l'enregistrement sous forme d'un objet
        $product = $result->fetch(PDO::FETCH_OBJ);
       ?>
    </head>
    <body> 
        <div class="container"> 
                
        <?php 
 if (file_exists("Header/header_detail.php") ) 
 {
      include("Header/header_detail.php");
 } 
 else 
 {
      // Erreur (à gérer)
      echo "file does not exist ! ";
 } ?>
       
            
            <div class="col-12 d-flex justify-content-center">
                <img src="images/<?=$pro_id?>" class="w-50" alt="Image responsive" title="<?=$pro_id.".".$product->pro_photo;?>" >
            </div>

            

            <form name="Product detail" id="Product detail">
                <div class="form-group">
                    <label for="pro_id"><b>Identifiant :</b></label><input type="text" class="form-control" name="pro_ref" id="pro_ref" value="<?php echo $product->pro_id?>" Readonly>
                    <label for="pro_ref"><b>Référence :</b></label><input type="text" class="form-control" name="pro_ref" id="pro_ref" value="<?php echo $product->pro_ref?>" Readonly>
                    <label for="nomProduit"><b>Catégorie :</b></label><input type="text" class="form-control" name="nomProduit" id="nomProduit" value="<?php echo $product->cat_nom?>" Readonly>
                    <label for="pro_libelle"><b>Libéllé produit :</b></label><input type="text" class="form-control" name="pro_libelle" id="pro_libelle" value="<?php echo $product->pro_libelle ?>" Readonly>
                    <label for="pro_description"><b>Description produit :</b></label><input type="text" class="form-control" name="pro_description" id="pro_description" value="<?php echo $product->pro_description?>" Readonly>
                    <label for="pro_prix"><b>Prix :</b></label><input type="text" class="form-control" name="pro_prix" id="pro_prix" value="<?php echo $product->pro_prix ?>" Readonly>
                    <label for="pro_stock"><b>Quantité en stock :</b></label><input type="number" class="form-control" name="pro_stock" id="pro_stock" value="<?php echo $product->pro_stock ?>" Readonly>
                    <label for="pro_couleur"><b>Couleur Produit :</b></label><input type="text" class="form-control" name="pro_couleur" id="pro_couleur" value="<?php echo $product->pro_couleur ?>" Readonly>
                    <br>
                    <label for="pro_bloque"><b>Produit bloqué :</b></label>
                         <div class="form-check form-check-inline">
                            <label class="form-check-label" for="pro_bloque">Oui&nbsp</label><input class="form-check-input" type="radio" name="pro_bloque" id="pro_bloque1"  <?php if ($product->pro_bloque == 1) echo"checked"; ?> disabled>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="pro_bloque">Non&nbsp</label><input class="form-check-input" type="radio" name="pro_bloque" id="pro_bloque2"   <?php if ($product->pro_bloque == 0) echo"checked"; ?> disabled>
                        </div>
                    <br>
                    <label for="pro_d_ajout"><b>Date d'ajout :</b></label><input type="text" class="form-control" name="pro_d_ajout" id="pro_d_ajout" value="<?php echo $product->pro_d_ajout?>" Readonly>
                    <label for="pro_d_modif"><b>Date de modification :</b></label><input type="text" class="form-control" name="pro_d_modif" id="pro_d_modif" value="<?php echo $product->pro_d_modif?>" Readonly>
                    
                   
                </div>  

            </form>

            <div class="d-flex justify-content-center" name = actionProduit>
                <a  class="btn" href="update.php?pro_id=<?=$pro_id;?>"><button class="btn-success">Modifier</button></a>
              
                <a  class="btn" href="delete.php?pro_id=<?=$pro_id;?>"><button class="btn-primary">Supprimer</button></a>
                
                <a  class="btn" href="table_admin.php"><button class="btn-secondary">Retour</button></a>
            </div>


        <?php 
 if (file_exists("Footer/footer.php") ) 
 {
      include("Footer/footer.php");
 } 
 else 
 {
      // Erreur (à gérer)
      echo "file does not exist ! ";
 } ?>
       
       
        </div>





<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
    </html>
<?php 
    
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
        
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        </body>
        </html>
        
       <?php } ?>