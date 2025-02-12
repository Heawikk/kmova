<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD | KMOVA</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/src/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/src/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/src/favicon/favicon-16x16.png">
    <link rel="shortcut icon" type="image/png" sizes="32x32" href="/src/favicon/favicon-32x32.png"><link rel="manifest" href="/src/favicon/site.webmanifest">
</head>
<body>
    <div class="navbar">
        <h1>Админ Панель</h1>
        <div class="nav-buttons">
            <button class="nav-button">Посты</button>
            <button class="nav-button">Статистика</button>
            <button class="nav-button">Пользователи</button>
            <button class="nav-button">Настройки</button>
        </div>
        <div class="user-info">
            <span><?php echo htmlspecialchars($user['username']); ?></span>
            <form action="logout.php" method="POST">
                <button type="submit" class="logout-button">🗙</button>
            </form>
        </div>
    </div>

    <div class="panels">
        <div class="panel">Публикации, Страницы</div>
        <div class="panel">Quick Статистика</div>
        <div class="panel">Репорты, Отзывы</div>
    </div>
</body>
</html>