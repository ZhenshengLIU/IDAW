<?php

require_once('config.php');

$connectionString = "mysql:host=" . _MYSQL_HOST;
if (defined('_MYSQL_PORT')) {
    $connectionString .= ";port=" . _MYSQL_PORT;
}

$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
$pdo = null;

try {

    $pdo = new PDO($connectionString, _MYSQL_USER, _MYSQL_PASSWORD, $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    $sql = file_get_contents('create_db.sql');
    
    if ($sql === false) {
        throw new Exception('Cannot read SQL file.');
    }
    

    $pdo->exec($sql);
    
    echo "Database successfully initialized.";
} catch (PDOException $erreur) {
    echo 'Database connection error: ' . $erreur->getMessage();
    exit();
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
    exit();
}


$pdo = null;
?>
