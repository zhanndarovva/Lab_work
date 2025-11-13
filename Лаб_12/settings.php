<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $theme = $_POST['theme'];
    $font = $_POST['font'];
    $username = trim($_POST['username']);

    if ($username !== '') {
        $_SESSION['username'] = $username;
    }

    setcookie("theme", $theme, time() + 60 * 60 * 24 * 30, "/", "", true, true);
    setcookie("font", $font, time() + 60 * 60 * 24 * 30, "/", "", true, true);

    header("Location: home.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Настройки</title>
</head>
<body>
    <h1>Настройки профиля</h1>
    <form method="post">
        <label>Имя пользователя:</label><br>
        <input type="text" name="username" placeholder="Введите имя"><br><br>

        <label>Тема оформления:</label><br>
        <select name="theme">
            <option value="light">Светлая</option>
            <option value="dark">Тёмная</option>
        </select><br><br>

        <label>Размер шрифта:</label><br>
        <select name="font">
            <option value="small">Малый</option>
            <option value="medium" selected>Средний</option>
            <option value="large">Большой</option>
        </select><br><br>

        <button type="submit">Сохранить</button>
    </form>
    <p><a href="home.php">Назад</a></p>
</body>
</html>





