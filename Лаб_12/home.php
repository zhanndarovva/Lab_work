<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = "Гость";
}
$theme = $_COOKIE['theme'] ?? 'light';
$font = $_COOKIE['font'] ?? 'medium';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Персональные настройки</title>
    <style>
        body {
            font-family: 'Verdana', sans-serif;
            margin: 0;
            padding: 0;
            transition: all 0.3s ease;
            background-color: #f5f5f5;
            color: #333;
        }
        .dark-theme body {
            background-color: #1a1a1a;
            color: #eee;
        }
        .container {
            max-width: 700px;
            margin: 50px auto;
            padding: 25px;
            border-radius: 12px;
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        .dark-theme .container {
            background-color: rgba(40, 40, 40, 0.95);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        select, input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border-radius: 6px;
            border: 1px solid #ccc;
            width: 100%;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }
        .dark-theme select, .dark-theme input {
            background-color: #333;
            color: #fff;
            border: 1px solid #555;
        }
        button {
            padding: 12px;
            border-radius: 6px;
            border: none;
            background-color: #28a745;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.2s;
        }
        button:hover {
            background-color: #218838;
        }
        p {
            text-align: center;
        }
        .font-small { font-size: 14px; }
        .font-medium { font-size: 18px; }
        .font-large { font-size: 22px; }
    </style>
</head>
<body class="<?= ($theme == 'dark' ? 'dark-theme' : '') ?> font-<?= $font ?>">
    <div class="container">
        <h1>Добро пожаловать, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
        <p>
            <a href="settings.php">Изменить настройки</a> | 
            <a href="logout.php">Выйти</a>
        </p>
        <?php
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['product'])) {
                $_SESSION['cart'][] = $_POST['product'];
            }
            if (isset($_POST['clear'])) {
                $_SESSION['cart'] = [];
            }
        }
        ?>
        <h2>Корзина покупок</h2>
        <form method="post">
            <input type="text" name="product" placeholder="Добавить товар">
            <button type="submit">Добавить</button>
            <button type="submit" name="clear">Очистить корзину</button>
        </form>

        <?php if (!empty($_SESSION['cart'])): ?>
            <ul>
                <?php foreach ($_SESSION['cart'] as $item): ?>
                    <li><?= htmlspecialchars($item) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Корзина пуста</p>
        <?php endif; ?>
    </div>
</body>
</html>


