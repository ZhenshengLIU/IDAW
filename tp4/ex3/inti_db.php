<?php

$host = 'localhost'; 
$dbname = 'create_db'; 
$username = 'root'; 
$password = 'root'; 

try {

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 
    $sql = file_get_contents('create_db.sql');

    $pdo->exec($sql);
    
    echo "create sucessfully";
} catch (PDOException $e) {
    echo "create unsucessfully " . $e->getMessage();
}
?>