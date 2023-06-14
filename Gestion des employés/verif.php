<?php
/*session_start();*/
require 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $query="select count(*) from users where login='$login'and password='$password'";
    $result=mysqli_query($conn,$query);
    $data=mysqli_fetch_row($result);
    if ($data[0]=1){
        // Authentification réussie
        setcookie('auth', 'true', time()+3600); // Set cookie for 1 hour
        header('Location: allEmpls.php');
        exit();
    }
    else {
        // Authentification échouée
        header('Location: index.html');
        exit();
    }
}
    // Recherche de l'utilisateur dans la base de données
    //$stmt = $conn->prepare('SELECT * FROM users WHERE login = ? AND password = ?');
    //$stmt->execute([$login, md5($password)]);
    //$user = $stmt->fetch();

    /*if ($user) {
        // Authentification réussie
        $_SESSION['user'] = $user;
        header('Location: allEmpls.php');
        exit();
    } else {
        // Authentification échouée
        header('Location: index.html');
        exit();
    }
}*/
