<?php
// 数据库连接信息
$host = 'localhost';  // 数据库主机
$user = 'root';  // 数据库用户名
$password = 'root';  // 数据库密码
$dbname = 'newdatabasetest';  // 新数据库名称
$sqlFilePath = 'create_db.sql';  // .sql 文件路径

try {

    $pdo = new PDO("mysql:host=$host", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $pdo->exec("CREATE DATABASE `$dbname`");
    echo "database `$dbname` create sucessfully。<br>";

    $pdo->exec("USE `$dbname`");


    $sql = file_get_contents($sqlFilePath);
    
 
    $pdo->exec($sql);
    echo "SQL document has been excuted sucessfully。<br>";
     

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