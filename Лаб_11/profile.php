<?php
if (isset($_POST['clear'])) {
    header("Location: profile.php");
    exit;
}

date_default_timezone_set('Asia/Almaty');
$name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'Гость';
$city = isset($_GET['city']) ? htmlspecialchars($_GET['city']) : 'неизвестный город';

if ($name !== 'Гость' || $city !== 'неизвестный город') {
    if (!is_dir('history')) {
        mkdir('history');
    }

    $time = date('Y-m-d_H-i-s');
    $file = "history/{$time}.txt";
    $content = "Имя: {$name}\nГород: {$city}\nДата: " . date('Y-m-d H:i:s');

    file_put_contents($file, $content);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Профиль</title>
    <style>
        body {
            font-family: Arial;
            background: #cde6ff;
            padding: 40px;
            margin: 0;
        }
        .container {
            max-width: 620px;
            margin: auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #003366;
        }
        p {
            text-align: center;
            font-size: 18px;
            color: #003366;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        input {
            padding: 10px;
            border: 1px solid #888;
            border-radius: 6px;
            font-size: 16px;
        }
        button {
            padding: 12px;
            background: #0055cc;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #003f99;
        }
        .history-btn {
            display: block;
            margin-top: 15px;
            text-align: center;
            background: #009933;
            color: white;
            padding: 10px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 16px;
        }
        .history-btn:hover {
            background: #007a29;
        }
        .clear-btn {
            background: #cc0000;
        }
        .clear-btn:hover {
            background: #990000;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Профиль пользователя</h2>

    <p>Привет, <strong><?= $name ?></strong>!<br>
    Добро пожаловать из города <strong><?= $city ?></strong>.</p>

    <form action="profile.php" method="get">
        <input type="text" name="name" placeholder="Введите ваше имя">
        <input type="text" name="city" placeholder="Введите ваш город">
        <button type="submit">Обновить данные</button> <br>
    </form>

    <form action="profile.php" method="post">
        <button class="clear-btn" name="clear">Очистить данные</button>
    </form>

    <a class="history-btn" href="history.php">История пользователей</a>

</div>

</body>
</html>

