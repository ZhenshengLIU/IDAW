<?php

session_start();

require_once('config.php');

$pdo=new PDO("mysql:host=" . _MYSQL_HOST . ";port=" . _MYSQL_PORT . ";dbname=" . _MYSQL_DBNAME, _MYSQL_USER, _MYSQL_PASSWORD);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);


if(!isset($_SESSION['selectedUser'])){
    $_SESSION['selectedUser'] = ['id' => '', 'name' => '', 'email' => ''];
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (isset($_POST['select'])) {
            if ($_SESSION['selectedUser']['id'] == $_POST['id']) {
                $_SESSION['selectedUser'] = ['id' => '', 'name' => '', 'email' => ''];
            } else {
                $_SESSION['selectedUser']['id'] = $_POST['id'];
                $_SESSION['selectedUser']['name'] = $_POST['name'];
                $_SESSION['selectedUser']['email'] = $_POST['email'];
            }   
    } elseif (isset($_POST['add'])) {
        $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->execute([$_POST['name'], $_POST['email']]);
        header('Location: ' . $_SERVER['PHP_SELF']); 
        exit;

    } elseif (isset($_POST['edit'])) {
        $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        $stmt->execute([$_POST['name'], $_POST['email'], $_POST['id']]);

    } elseif (isset($_POST['delete'])) {
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$_POST['id']]);
        $_SESSION['selectedUser'] = ['id' => '', 'name' => '', 'email' => ''];
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
            <th></th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr class="<?= $user['id'] == $_SESSION['selectedUser']['id']? 'selected' : '' ?>">
            <td><?= htmlspecialchars($user['id']) ?></td>
            <td><?= htmlspecialchars($user['name']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td>

                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <input type="hidden" name="name" value="<?= htmlspecialchars($user['name']) ?>">
                    <input type="hidden" name="email" value="<?= htmlspecialchars($user['email']) ?>">
                    <button type="submit" name="select" class="circle-button"></button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Add/Edit/Delete User</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $_SESSION['selectedUser']['id'] ?>">


        name: <input type="text" name="name" value="<?= htmlspecialchars($_SESSION['selectedUser']['name']) ?>" required><br>
        email: <input type="text" name="email" value="<?= htmlspecialchars($_SESSION['selectedUser']['email'])?>" required><br>
        
        <div class="button-group">
        <button type="submit" name="add" <?= $_SESSION['selectedUser']['id']  ? 'disabled' : '' ?>>Add</button>
        <button type="submit" name="edit" <?= $_SESSION['selectedUser']['id'] ? '' : 'disabled' ?>>Edit</button>
        <button type="submit" name="delete" <?= $_SESSION['selectedUser']['id']  ? '' : 'disabled' ?>>Delete</button>
        </div>


    </form>
</body>
</html>
