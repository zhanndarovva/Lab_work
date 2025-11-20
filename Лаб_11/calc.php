<?php
if (isset($_POST['clear'])) {
    header("Location: calc.php");
    exit;
}

$a = isset($_GET['a']) && $_GET['a'] !== '' ? (int)$_GET['a'] : 0;
$b = isset($_GET['b']) && $_GET['b'] !== '' ? (int)$_GET['b'] : 0;

$result = '';

if (isset($_GET['a']) || isset($_GET['b'])) {
    $sum = $a + $b;
    $diff = $a - $b;
    $prod = $a * $b;
    $div = ($b != 0) ? ($a / $b) : 'деление на ноль невозможно';

    $result = "
        <p>Сумма: <strong>{$sum}</strong></p>
        <p>Разность: <strong>{$diff}</strong></p>
        <p>Произведение: <strong>{$prod}</strong></p>
        <p>Частное: <strong>{$div}</strong></p>
    ";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Калькулятор</title>
    <style>
        body { font-family: Arial; background: #e6f7ff; padding: 40px; margin: 0; }
        .container { max-width: 400px; margin: auto; background: #ffffff; padding: 25px;
            border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.2); }
        h2 { text-align: center; color: #003366; margin-bottom: 20px; }
        form { display: flex; flex-direction: column; gap: 15px; }
        input[type="number"] { padding: 10px; font-size: 16px; border-radius: 6px; border: 1px solid #888; }
        button { padding: 12px; background: #0055cc; color: white; border: none; border-radius: 6px; font-size: 16px; cursor: pointer; }
        button:hover { background: #003f99; }
        .clear-btn { background: #cc0000; }
        .clear-btn:hover { background: #990000; }
        .result { margin-top: 20px; background: #f0f8ff; padding: 15px; border-radius: 8px; border-left: 5px solid #007bff; }
    </style>
</head>
<body>
<div class="container">
    <h2>Калькулятор</h2>

    <form method="get" action="calc.php">
        <input type="number" name="a" placeholder="Введите число a" value="<?= htmlspecialchars($a) ?>">
        <input type="number" name="b" placeholder="Введите число b" value="<?= htmlspecialchars($b) ?>">
        <button type="submit">Вычислить</button>
    </form>
            <br>
    <form method="post" action="calc.php">
        <button type="submit" name="clear" class="clear-btn">Очистить</button>
    </form>

    <?php if ($result): ?>
        <div class="result">
            <?= $result ?>
        </div>
    <?php endif; ?>

</div>

</body>
</html>

