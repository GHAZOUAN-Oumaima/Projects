<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="style.css">
    <script>
         function confirmDelete() {
        if (confirm("Êtes-vous sûr de vouloir supprimer cet employé ?")) {
            // Si l'utilisateur clique sur OK, continuer avec la suppression
            window.location.href = "delEmpl.php?id=" + $id;
        }
    }

    function confirmEdit() {
        if (confirm("Êtes-vous sûr de vouloir modifier cet employé ?")) {
            // Si l'utilisateur clique sur OK, continuer avec la modification
            window.location.href = "editEmpl.php?id=" + $id;
        }
    }
        </script>
</head>
<body>
    
  
<?php


/*session_start();*/

         //connexion à la base de donnée
          include_once "dbconnect.php";
         //on récupère le id dans le lien
          $id = $_GET['id'];
          
        

          //requête pour afficher les infos d'un employé
          $req = mysqli_query($conn , "SELECT * FROM employes WHERE id = $id");
          $row = mysqli_fetch_assoc($req);


       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if(isset($nom) && isset($prenom) && $sexe){
               //requête de modification
               $req = mysqli_query($conn, "UPDATE employes SET nom = '$nom' , prenom = '$prenom' , sexe = '$sexe' , adresse='$adresse' , dateNaissance='$dateNaissance', numServ='$numServ' WHERE id = $id");
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: allEmpls.php");
                }else {//si non
                    $message = "Employé non modifié";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
       
    
    ?>

    <div class="form">
        <a href="allEmpls.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>Modifier l'employé : <?=$row['nom']?> </h2>
        <p class="erreur_message">
           <?php 
              if(isset($message)){
                  echo $message ;
              }
           ?>
        </p>
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="nom" value="<?=$row['nom']?>">
            <label>Prénom</label>
            <input type="text" name="prenom" value="<?=$row['prenom']?>">
            
            
            <label>sexe</label>
            <input type="text" name="sexe" value="<?=$row['sexe']?>">
            


            <label>adresse</label>
            <input type="text" name="adresse" value="<?=$row['adresse']?>">
            <label>dateNaissace</label>
            <input type="date" name="dateNaissance" value="<?=$row['dateNaissance']?>">
            <label>numServ</label>
            <input type="text" name="numServ" value="<?=$row['numServ']?>">
           <!-- <select required id="numServ" name="numServ" value="<?=$row['numServ']?>">
          <option value="">Sélectionnez une service</option>
          <option value="1">vente</option>
          <option value="2">approvisionnement</option>
          <option value="3">réclamation</option>
        </select>-->
            <input type="submit" value="Modifier" name="button" >
        </form>
    </div>
</body>

</html>
