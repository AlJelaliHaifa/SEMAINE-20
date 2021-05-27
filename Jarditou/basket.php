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
    <meta name="viewport" content="width=device-width, initial-scale=1.0",shrink-to-fit=no>
    <title>Panier</title>
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container"> 
        <?php  include 'Header/header_detail.php'; ?>

<p id="tableau"></p>
    <div class="table-responsive"> 
      <table class="table table-hover table-bordered w-100 w-sm-50"> 
            <tr class="table-active">
              <th>Photo</th>
              <th>ID</th>
              <th>Référence</th>
              <th>Libellé</th>
              <th>Prix</th>
              <th>Couleur</th>
            </tr>   
          </thead>
          <tbody>
            <?php
            $total = 0;
            for ($i = 0; $i <= count($_SESSION["basket"])-1; $i++){
                $requete = "SELECT * FROM produits where pro_id=".$_SESSION["basket"][$i];
                $result = $db->query($requete);
                $row = $result->fetch(PDO::FETCH_OBJ); 

                echo'<tr>';?>
                    <td class="table-warning"><img src="images/<?=$row->pro_id.".".$row->pro_photo;?>" alt="<?=$row->pro_id.".".$row->pro_photo;?>" width="100">.</td>
            
    <?php
                    echo"<th class='table-warning'>".$row->pro_id."</th>";
                    echo"<th class='table-warning'>".$row->pro_ref."</th>";
                    echo "<th class='table-warning'>".$row->pro_libelle."</th>";
                    echo"<th class='table-warning'>".$row->pro_prix."</th>";
                    $total = $total + $row->pro_prix;
                    echo"<th class='table-warning'>".$row->pro_couleur."</th>";?>
                    <th><a href="delete_basket.php?idtab=<?=$i?>">Supprimer du panier</a></th>
           
           <?php    echo"</tr>";
    
    
        $result->closeCursor();
    }
       ?>
        </tbody> 
         
    </table>
    </div>
    <br>
    <br>
    <div>
      <?php if ($total != 0){?>
              <h3  class="d-flex justify-content-center">Le Montant total de votre panier est de <?= round($total - (($total * 20) / 100),2) ?> Euros HT</h3> 
              <br> 
              <h3  class="d-flex justify-content-center">TVA : 20%</h3>
              <br> 
              <h3  class="d-flex justify-content-center">Le Montant total de votre panier est de <?= round($total,2) ?> Euros TTC</h3>
      <?php }
            else {?>
              <h3 class="d-flex justify-content-center">Votre panier est vide</h3>
        <?php } ?>
    </div>
    <br>

    <div class="d-flex justify-content-center" name ="productAction">
                <a  class="btn btn-success" href="table.php">Retour</a>
    </div>

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