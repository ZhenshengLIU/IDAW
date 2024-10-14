<?php

require_once('config.php');

// connected string
$connectionString = "mysql:host=" . _MYSQL_HOST;

if (defined('_MYSQL_PORT')) {
    $connectionString .= ";port=" . _MYSQL_PORT;
}
$connectionString .= ";dbname=" . _MYSQL_DBNAME;

$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

$pdo = null;

try {
    // Create PDO entity
    $pdo = new PDO($connectionString, _MYSQL_USER, _MYSQL_PASSWORD, $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erreur) {

    echo 'Erreur : ' . $erreur->getMessage();
    exit();
}

$request = $pdo->prepare("SELECT * FROM users");

try {

    $request->execute();
    
    $results = $request->fetchAll(PDO::FETCH_OBJ);
    
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Username</th><th>Email</th></tr>";
    
    foreach ($results as $row) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row->id) . "</td>";
        echo "<td>" . htmlspecialchars($row->name) . "</td>";
        echo "<td>" . htmlspecialchars($row->email) . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
    
} catch (PDOException $e) {

    echo 'Erreur : ' . $e->getMessage();
}

// disconnected
$pdo = null;
?>
