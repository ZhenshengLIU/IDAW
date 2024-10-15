<?php

require_once('config.php');

&pdo=new PDO("mysql:hsot=" . _MYSQL_HOST . ";port=" . _MYSQL_PORT . ";dbname=" . _MYSQL_NAME, _MYSQL_USER, _MYSQL_PASSWORD);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->execute([$name, $email]);
        header("Location: index.php");
        exit();

    } elseif (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        $stmt->execute([$name, $email, $id]);
        header("Location: index.php");
        exit();

    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
        header("Location: index.php");
        exit();
    }
}

$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Example</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Users</h1>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['id']) ?></td>
            <td><?= htmlspecialchars($user['name']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td>

                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <input type="hidden" name="name" value="<?= $user['name'] ?>">
                    <input type="hidden" name="email" value="<?= $user['email'] ?>">
                    <button type="submit" name="edit">Edit</button>
                </form>

                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <button type="submit" name="delete">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Add/Edit User</h2>
    <form method="POST">
        <!-- 如果是编辑操作，将用户id放入隐藏字段中 -->
        <input type="hidden" name="id" value="<?= isset($_POST['id']) ? $_POST['id'] : '' ?>">
        name: <input type="text" name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>"><br>
        email: <input type="text" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>"><br>
        <button type="submit" name="<?= isset($_POST['edit']) ? 'edit' : 'add' ?>">Submit</button>
    </form>
</body>
</html>
