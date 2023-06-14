
<?php
//session_start();
  //connexion a la base de données
  include_once "dbconnect.php";
  //récupération de l'id dans le lien
 // Récupère l'ID de l'employé à supprimer
$id = $_GET['id'];

// Vérifie si l'ID est défini
if (isset($id)) {
    // Connexion à la base de données
    $connexion = new mysqli('localhost', 'root', '', 'grh');

    // Requête SQL pour supprimer l'employé
    $requete = "DELETE FROM employes WHERE id = $id";

    // Exécute la requête SQL
    if ($connexion->query($requete) === TRUE) {
        echo "L'employé a été supprimé avec succès.";
        header("location: allEmpls.php");
    } else {
        echo "Erreur : " . $connexion->error;
    }

    // Ferme la connexion à la base de données
    $connexion->close();
} else {
    echo "Erreur : aucun ID spécifié.";
}

?>

//http://localhost/newnew/delEmpl.php?id=1