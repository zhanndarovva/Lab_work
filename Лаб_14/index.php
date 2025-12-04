<?php
include('db_connect.php');
include('student_functions.php');

$error_message = $success_message = "";
$email_search = isset($_GET['email_search']) ? $_GET['email_search'] : "";
$edit_id = isset($_GET['edit_id']) ? $_GET['edit_id'] : null;
$edit_full_name = "";
$edit_email = "";
$edit_group_name = "";

// Если редактируем студента
if ($edit_id) {
    // Получаем данные студента для редактирования
    $sql = "SELECT full_name, email, group_name FROM students WHERE id = $edit_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        $edit_full_name = $student['full_name'];
        $edit_email = $student['email'];
        $edit_group_name = $student['group_name'];
    } else {
        $error_message = "Студент не найден.";
    }
}

// Обработка добавления нового студента
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_student'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $group_name = $_POST['group_name'];
    $success_message = add_student($conn, $full_name, $email, $group_name);
}

// Обработка редактирования студента
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_student'])) {
    $edit_id = $_POST['edit_id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $group_name = $_POST['group_name'];
    $success_message = edit_student($conn, $edit_id, $full_name, $email, $group_name);
}

// Обработка удаления студента
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_student_id'])) {
    $delete_id = $_POST['delete_student_id'];
    $success_message = delete_student($conn, $delete_id);
}

// Получение списка студентов
$students_result = search_students($conn, $email_search);

// Подключаем шаблон HTML
include('template.php');
?>
