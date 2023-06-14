<?php
session_start();	
$showAlert = false;
$showError = false;
$exists=false;
	
if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// Include file which makes the
	// Database Connection.
	include 'dbconnect.php';
	
	$nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $sexe=$_POST['sexe'];
    $adresse=$_POST['adresse'];
    $dateNaissance=$_POST['dateNaissance'];
    $numServ=$_POST['numServ'];
        
			
	// Vérifier que le numéro de service existe dans la table `services`
$sql = "SELECT numServ FROM services";
$result = mysqli_query($conn, $sql);
$existing_numServs = array();
while ($row = mysqli_fetch_assoc($result)) {
  $existing_numServs[] = $row['numServ'];
}
if (!in_array($numServ, $existing_numServs)) {
  echo "Erreur: le numéro de service n'existe pas.";
  exit();
}

// Insérer les données dans la table `employes`
$sql = "INSERT INTO employes (nom, prenom, sexe, adresse, dateNaissance, numServ) VALUES ('$nom', '$prenom', '$sexe', '$adresse', '$dateNaissance', '$numServ')";
$result = mysqli_query($conn, $sql);
if (!$result) {
  echo "Erreur: " . mysqli_error($conn);
  exit();
}

echo "Les données ont été insérées avec succès.";

	//$sql = "Select * from employes where username='$nom'";
	//$sql = "INSERT INTO `employes`(`code`, `nom`, `prenom`, `sexe`, `adresse`, `dateNaissance`, `numServ`)
	//$sql="SELECT  `nom`, `prenom`, `sexe`, `adresse`, `dateNaissance`, `numServ` FROM `employes`";
	//$sql = "INSERT INTO 'employes' ( 'nom','prenom', 'sexe', 'adresse' , 'dateNaissance', 'numServ') VALUES ($nom,$prenom,$sexe, $adresse, $dateNaissance, $numServ)";
	$sql = "INSERT INTO `employes` (`nom`, `prenom`, `sexe`, `adresse`, `dateNaissance`, `numServ`) VALUES ('" . mysqli_real_escape_string($conn, $nom) . "', '" . mysqli_real_escape_string($conn, $prenom) . "', '" . mysqli_real_escape_string($conn, $sexe) . "', '" . mysqli_real_escape_string($conn, $adresse) . "', '" . mysqli_real_escape_string($conn, $dateNaissance) . "', '" . mysqli_real_escape_string($conn, $numServ) . "')";


	
	$result = mysqli_query($conn, $sql);
	
	$num = mysqli_num_rows($result);
	if (mysqli_affected_rows($conn) > 0) {
		// La requête a renvoyé au moins un enregistrement
		$row = mysqli_fetch_assoc($result);
		// Traitez les résultats ici
	} else {
		// La requête n'a pas renvoyé d'enregistrements
		echo "Aucun résultat trouvé.";
	}
	
	// This sql query is use to check if
	// the username is already present
	// or not in our Database
	if($num == 0) {
		
	
			
				
			// Password Hashing is used here.
			$sql = "INSERT INTO 'employes' ('nom',
				'prenom', 'sexe', 'adresse' , 'dateNaissance', 'numServ') VALUES ($nom,
				$prenom,$sexe, $adresse, $dateNaissance, $numServ)";
	
			$result = mysqli_query($conn, $sql);
	
			if ($result) {
				$showAlert = true;
			}
		
			
	}// end if
	
if($num>0)
{
	$exists="Not available";
}
	
}//end if
	
?>
	
<!doctype html>
	
<html lang="en">

<head>
	
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content=
		"width=device-width, initial-scale=1,
		shrink-to-fit=no">
	<link rel="stylesheet" href="style.css">
	<!-- Bootstrap CSS -->
	<!--<link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
		integrity=
"sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
		crossorigin="anonymous">-->
</head>
	
<body>
	
<?php
	
	if($showAlert) {
	
		echo ' <div class="alert alert-succe
			alert-dismissible fade show" role="alert">
	
			<strong>Success!</strong> Your account is
			now created and you can login.
			<button type="button" class="close"
				data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
		</div> ';
	}
	
	if($showError) {
	
		echo ' <div class="alert alert-danger
			alert-dismissible fade show" role="alert">
		<strong>Error!</strong> '. $showError.'
	
	<button type="button" class="close"
			data-dismiss="alert aria-label="Close">
			<span aria-hidden="true">×</span>
	</button>
	</div> ';
}
		
	if($exists) {
		echo ' <div class="alert alert-danger
			alert-dismissible fade show" role="alert">
	
		<strong>Error!</strong> '. $exists.'
		<button type="button" class="close"
			data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
	</div> ';
	}

?>
	
<div class="container my-4 ">
	
	<h1 class="text-center">Signup Here</h1>
	<form action="signup.php" method="post" class="login-form">
  <table>
    <tr>
      <td><label for="nom">Nom</label></td>
      <td><input type="text" class="form-control" id="nom" name="nom" ></td>
    </tr>
    <tr>
      <td><label for="prenom">Prenom</label></td>
      <td><input type="text" class="form-control" id="prenom" name="prenom"></td>
    </tr>
    <tr>
      <td><label for="sexe">Sexe</label></td>
      <td>
        <input type="radio" required id="homme" name="sexe" value="homme">
        <label for="homme">H</label>
      </td>
      <td>
        <input type="radio" required id="femme" name="sexe" value="femme">
        <label for="femme">F</label>
      </td>
    </tr>
    <tr>
      <td><label for="adresse">Adresse :</label></td>
      <td><input type="text" required id="adresse" name="adresse"></td>
    </tr>
    <tr>
      <td><label for="dateNaissance">Date de naissance :</label></td>
      <td><input type="date" required id="dateNaissance" name="dateNaissance"></td>
    </tr>
    <tr>
      <td><label for="numServ">Service :</label></td>
      <td>
        <select required id="numServ" name="numServ">
          <option value="">Sélectionnez une service</option>
          <option value="1">vente</option>
          <option value="2">approvisionnement</option>
          <option value="3">réclamation</option>
        </select>
      </td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" value="Valider" id="sub"></td>
    </tr>
  </table>
</form>

</div>
	
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	
<!--<script src="
https://code.jquery.com/jquery-3.5.1.slim.min.js"
	integrity="
sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
	crossorigin="anonymous">
</script>
	
<script src="
https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
	integrity=
"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
	crossorigin="anonymous">
</script>
	
<script src="
https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
	integrity=
"sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
	crossorigin="anonymous">
</script>
</body>
</html>-->
