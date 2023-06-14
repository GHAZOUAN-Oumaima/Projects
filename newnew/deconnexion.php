<?php
// Démarrer la session
session_start();

// Détruire la session
session_unset();
session_destroy();

// Rediriger vers le formulaire d'authentification
header('Location: signup.php');
exit();
?>
