<?php

$login = isset($_POST['login']) ? $_POST['login'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';


echo "Login: " . htmlspecialchars($login) . "<br>";
echo "Mot de passe: " . htmlspecialchars($password);
?>