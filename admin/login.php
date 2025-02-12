<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && $user['password'] === $password) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: dashboard.php');
        exit;
    } else {
        echo "Wrong login or pass.";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>LOGIN | KMOVA</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="/src/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/src/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/src/favicon/favicon-16x16.png">
    <link rel="shortcut icon" type="image/png" sizes="32x32" href="/src/favicon/favicon-32x32.png"><link rel="manifest" href="/src/favicon/site.webmanifest">
</head>
<body>
    <img class="icon" src="/src/main/80pobeda.png">
    <img class="icon" src="/src/main/95_anabar.png">

    <div class="container">
        <h1>Dashboard</h1>
        <form method="POST">
            <input type="text" name="username" placeholder="User" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>