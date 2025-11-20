<?php
date_default_timezone_set('Asia/Almaty');

$files = glob("history/*.txt");

if (isset($_POST['clear'])) {
    foreach ($files as $file) {
        unlink($file);
    }
    header("Location: history.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>История пользователей</title>
    <style>
        body {
            font-family: Arial;
            background: #ffe3c6;
            padding: 40px;
            margin: 0;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        h2 {
            text-align: center;
            color: #663c00;
        }
        .record {
            background: #fff4e6;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            border-left: 5px solid #ff9900;
            color: #663c00;
        }
        .back, button {
            display: block;
            margin-top: 20px;
            text-align: center;
            background: #0066cc;
            color: white;
            padding: 10px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 16px;
        }
        .back:hover {
            background: #004d99;
        }
        button {
            width: 100%;
            border: none;
            cursor: pointer;
            background: #cc0000;
        }
        button:hover {
            background: #990000;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>История пользователей</h2>

    <?php
    if (empty($files)) {
        echo "<p>История пока пустая.</p>";
    } else {
        foreach ($files as $file) {
            $content = nl2br(htmlspecialchars(file_get_contents($file)));
            echo "<div class='record'>{$content}</div>";
        }
    }
    ?>

    <form method="post">
        <button type="submit" name="clear">Очистить историю</button>
    </form>

    <a class="back" href="profile.php">Вернуться к профилю</a>
</div>

</body>
</html>

