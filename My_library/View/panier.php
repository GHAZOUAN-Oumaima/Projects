<?php 
   session_start();
   include_once "con_dbb.php";

   //supprimer les produits
   //si la variable del existe
   if(isset($_GET['del'])){
    $id_del = $_GET['del'] ;
    //suppression
    unset($_SESSION['panier'][$id_del]);
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>body{background: url('nature.jpeg')};</style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="style_catalogue.css">
</head>
<body class="panier">
    <header class="main-head">
        <nav>
            
            <ul>
                <li></li>
                <li><a href="index.php" id="home" class="link">Accueil</a></li>
            </ul>
        </nav>
    </header>
    <a href="catalogue.php" class="link">Catalogue</a>
    <section>
        <table>
            <tr>
                <th></th>
                <th>Nom</th>
                <th>Niveau</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Action</th>
            </tr>
            <?php 
              $total = 0 ;
              // liste des produits
              //récupérer les clés du tableau session
              $ids = array_keys($_SESSION['panier']);
              //s'il n'y a aucune clé dans le tableau
              if(empty($ids)){
                echo "Votre panier est vide";
              }else {
                //si oui 
                $products = mysqli_query($con, "SELECT * FROM products WHERE id IN (".implode(',', $ids).")");

                //lise des produit avec une boucle foreach
                foreach($products as $product):
                    //calculer le total ( prix unitaire * quantité) 
                    //et aditionner chaque résutats a chaque tour de boucle
                    $total = $total + $product['price'] * $_SESSION['panier'][$product['id']] ;
                ?>
                <tr>
                    <td><img src="project_images/<?=$product['img']?>"></td>
                    <td><?=$product['name']?></td>
                    <td><?=$product['niveau']?>ème année</td>
                    <td><?=$product['price']?>DH</td>
                    <td><?=$_SESSION['panier'][$product['id']] // Quantité?></td>
                    <td><a href="panier.php?del=<?=$product['id']?>"><img src="delete.png"></a></td>
                </tr>

            <?php endforeach ;} ?>

            <tr class="total">
                <th>Total : <?=$total?>DH</th>
            </tr>
        </table>
    </section>
</body>
</html>