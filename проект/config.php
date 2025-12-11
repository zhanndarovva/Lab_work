<?php
$host = "localhost";
$port = 3307; // Укажи свой порт, если отличается
$dbname = "student_db";
$username = "user";
$password = "12345";

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Создание таблицы students с новой структурой
    $sql = "CREATE TABLE IF NOT EXISTS students (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        date_of_birth DATE NOT NULL,
        group_name VARCHAR(50) NOT NULL,
        specialty VARCHAR(100) NOT NULL,
        email VARCHAR(100) UNIQUE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8";

    $pdo->exec($sql);

} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}
?>
