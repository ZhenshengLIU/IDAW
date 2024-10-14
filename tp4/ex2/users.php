<?php
// users.php
require_once('config.php');

// 构建连接字符串
$connectionString = "mysql:host=" . _MYSQL_HOST;

if (defined('_MYSQL_PORT')) {
    $connectionString .= ";port=" . _MYSQL_PORT;
}
$connectionString .= ";dbname=" . _MYSQL_DBNAME;

$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

$pdo = null;

try {
    // 创建PDO实例并连接数据库
    $pdo = new PDO($connectionString, _MYSQL_USER, _MYSQL_PASSWORD, $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erreur) {
    // 如果连接失败，显示错误信息
    echo 'Erreur : ' . $erreur->getMessage();
    exit();
}

// 准备 SQL 查询
$request = $pdo->prepare("SELECT * FROM User");

try {
    // 执行查询
    $request->execute();
    
    // 获取查询结果
    $results = $request->fetchAll(PDO::FETCH_OBJ);
    
    // 在 HTML 表格中显示结果
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Username</th><th>Email</th></tr>";
    
    foreach ($results as $row) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row->id) . "</td>";
        echo "<td>" . htmlspecialchars($row->username) . "</td>";
        echo "<td>" . htmlspecialchars($row->email) . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
    
} catch (PDOException $e) {
    // 如果查询失败，显示错误信息
    echo 'Erreur : ' . $e->getMessage();
}

// 关闭数据库连接
$pdo = null;
?>
