<?php

$login = isset($_POST['login']) ? $_POST['login'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';


echo "Login: " . htmlspecialchars($login) . "<br>";
echo "Mot de passe: " . htmlspecialchars($password);
?>

<?php
session_start(); 

$login = isset($_POST['login']) ? $_POST['login'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if ($login == 'admin' && $password == '1234567') {

    $_SESSION['login'] = $login;
    echo "<br>Bienvenue, " . htmlspecialchars($login) . "! Vous êtes connecté.";
    echo "<br><a href='index.php'>Aller à l'accueil</a>";
} else {
    echo "<br>Login ou mot de passe incorrect.";
}
?>