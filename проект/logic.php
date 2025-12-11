<?php
require_once "config.php";

// Функция для вычисления возраста по дате рождения
function calculateAge($dob) {
    $dob = new DateTime($dob);
    $today = new DateTime();
    $age = $today->diff($dob)->y;
    return $age;
}

// -------------------- Добавление студента --------------------
if (isset($_POST['create'])) {
    $stmt = $pdo->prepare("
        INSERT INTO students (name, date_of_birth, group_name, specialty, email) 
        VALUES (:name, :dob, :group_name, :specialty, :email)
    ");
    $stmt->execute([
        ':name' => $_POST['name'],
        ':dob' => $_POST['date_of_birth'],
        ':group_name' => $_POST['group_name'],
        ':specialty' => $_POST['specialty'],
        ':email' => $_POST['email']
    ]);
    header("Location: index.php"); // Перенаправление, чтобы форма не отправлялась повторно
    exit;
}

// -------------------- Обновление студента --------------------
if (isset($_POST['update'])) {
    $stmt = $pdo->prepare("
        UPDATE students 
        SET name=:name, date_of_birth=:dob, group_name=:group_name, specialty=:specialty, email=:email
        WHERE id=:id
    ");
    $stmt->execute([
        ':name' => $_POST['name'],
        ':dob' => $_POST['date_of_birth'],
        ':group_name' => $_POST['group_name'],
        ':specialty' => $_POST['specialty'],
        ':email' => $_POST['email'],
        ':id' => $_POST['id']
    ]);
    header("Location: index.php");
    exit;
}

// -------------------- Удаление студента --------------------
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM students WHERE id=:id");
    $stmt->execute([':id' => $_GET['delete']]);
    header("Location: index.php");
    exit;
}

// -------------------- Получение списка студентов --------------------
$stmt = $pdo->query("SELECT * FROM students ORDER BY id ASC");
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

// -------------------- Получение студента для редактирования --------------------
$editStudent = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM students WHERE id=:id");
    $stmt->execute([':id' => $_GET['edit']]);
    $editStudent = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
