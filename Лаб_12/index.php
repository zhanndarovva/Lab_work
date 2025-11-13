<?php
if (isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
} else {
    $lang = 'ru';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['lang'])) {
    $lang = $_POST['lang'];
    setcookie("lang", $lang, time() + 60 * 60 * 24 * 30, "/", "", true, true);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$texts = [
    'ru' => ['title' => 'Добро пожаловать!', 'select' => 'Выберите язык', 'cart' => 'Корзина покупок'],
    'en' => ['title' => 'Welcome!', 'select' => 'Choose language', 'cart' => 'Shopping Cart']
];
?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars($lang) ?>">
<head>
    <meta charset="UTF-8">
    <title><?= $texts[$lang]['title'] ?></title>
</head>
<body>
    <h1><?= $texts[$lang]['title'] ?></h1>
    <form method="post">
        <label><?= $texts[$lang]['select'] ?>:</label>
        <select name="lang">
            <option value="ru" <?= $lang == 'ru' ? 'selected' : '' ?>>Русский</option>
            <option value="en" <?= $lang == 'en' ? 'selected' : '' ?>>English</option>
        </select>
        <button type="submit">OK</button>
    </form>
    <p><a href="cart.php"><?= $texts[$lang]['cart'] ?></a></p>
</body>
</html>

