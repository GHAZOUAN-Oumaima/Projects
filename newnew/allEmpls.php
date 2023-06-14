<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de tous les Employés</title>
    <link rel="stylesheet" href="style.css">
    
    <script language='javascript'>
    

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
    <style>
img {
  max-width: 30px;
  max-height: 30px;
}
</style>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

th {
  background-color: #4CAF50;
  color: white;
}

td {
  border: 1px solid #ddd;
}
</style>
</head>
<body>
    <div class="container">
    <a href="signup.php" class="Btn_add" type="submit" > <img src="images/add.png"> Ajouter</a>
        
        <table>
            <tr id="items">
                <th>Nom</th>
                <th>Prénom</th>
                <th>sexe</th>
                <th>Adresse</th>
                <th>dateNaissance</th>
                <th>numServ</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php 
                //inclure la page de connexion
                include_once "dbconnect.php";
                
                //requête pour afficher la liste des employés
                $req = mysqli_query($conn, "SELECT * FROM employes");
                if(mysqli_num_rows($req) == 0){
                    //s'il n'existe pas d'employé dans la base de donné , alors on affiche ce message :
                    echo "Il n'y a pas encore d'employé ajouter !" ;
                    
                }else {
                    //si non , affichons la liste de tous les employés
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
                        <tr>
                            <td><?=$row['nom']?></td>
                            <td><?=$row['prenom']?></td>
                            <td><?=$row['sexe']?></td>
                            <td><?=$row['adresse']?></td>
                            <td><?=$row['dateNaissance']?></td>
                            <td><?=$row['numServ']?></td>                            <!--Nous alons mettre l'id de chaque employé dans ce lien -->
                            <td><a href="editEmpl.php?id=<?=$row['id']?>" onclick="confirmEdit()"><img src="images/pen.png"></a></td>
                            <td><a href="delEmpl.php?id=<?=$row['id']?>"  onclick="confirmDelete()"><img src="images/trash.png"></a></td>
                            

                            <!--<td><a href="delEmpl.php?id=<?php echo $employee['code']; ?>" onclick="confirmDelete()">Supprimer</a></td>-->

                            <!--<td><button id='id' onclick="confirmDelete()">CONFIRMER Supprimer</button></td>
                            <td><button id='id' onclick="confirmEdit()">CONFIRMER Modifier</button></td>-->

                        </tr>
                        <?php
                    }
                    
                }
            ?>
      
         
        </table>
   
   
   
   
    </div>
</body>
</html>