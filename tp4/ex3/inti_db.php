<?php

$host = 'localhost'; 
$dbname = 'newdatabasetest'; 
$username = 'root'; 
$password = 'root'; 

try {

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 
    $sql = file_get_contents('create_db.sql');

    $pdo->exec($sql);
    
    echo "create sucessfully";

    $query = "SELECT * FROM `users`"; 
    $stmt = $pdo->query($query);

    echo "<h2>Data from the database:</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>";
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
              </tr>";
    }
    
    echo "</table>";
} catch (PDOException $e) {
    echo "create unsucessfully " . $e->getMessage();
}
?>