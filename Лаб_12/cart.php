<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['product'])) {
    $product = $_POST['product'];
    $_SESSION['cart'][] = $product;
}

if (isset($_POST['clear'])) {
    $_SESSION['cart'] = [];
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Корзина</title>
</head>
<body>
    <h1>Корзина покупок</h1>
    <form method="post">
        <input type="text" name="product" placeholder="Введите название товара" required>
        <button type="submit">Добавить</button>
    </form>
    <h2>Товары в корзине:</h2>
    <ul>
        <?php foreach ($_SESSION['cart'] as $item): ?>
            <li><?= htmlspecialchars($item) ?></li>
        <?php endforeach; ?>
    </ul>
    <form method="post">
        <button type="submit" name="clear">Очистить корзину</button>
    </form>
    <p><a href="index.php">На главную</a></p>
</body>
</html>

