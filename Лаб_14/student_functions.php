<?php
// Функция для добавления студента
function add_student($conn, $full_name, $email, $group_name) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Неправильный формат email.";
    }
    $check_sql = "SELECT id FROM students WHERE email='$email'";
    $check_result = $conn->query($check_sql);
    if ($check_result->num_rows > 0) {
        return "Студент с таким email уже существует.";
    }
    $sql = "INSERT INTO students (full_name, email, group_name) VALUES ('$full_name', '$email', '$group_name')";
    return $conn->query($sql) === TRUE ? "Новая запись успешно добавлена!" : "Ошибка: " . $conn->error;
}

// Функция для редактирования студента
function edit_student($conn, $edit_id, $full_name, $email, $group_name) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Неправильный формат email.";
    }
    $check_sql = "SELECT id FROM students WHERE email='$email' AND id <> $edit_id";
    $check_result = $conn->query($check_sql);
    if ($check_result->num_rows > 0) {
        return "Email принадлежит другому студенту.";
    }
    $sql = "UPDATE students SET full_name='$full_name', email='$email', group_name='$group_name' WHERE id=$edit_id";
    return $conn->query($sql) === TRUE ? "Запись успешно обновлена!" : "Ошибка: " . $conn->error;
}

// Функция для удаления студента
function delete_student($conn, $delete_id) {
    $sql = "DELETE FROM students WHERE id = $delete_id";
    return $conn->query($sql) === TRUE ? "Запись успешно удалена." : "Ошибка: " . $conn->error;
}

// Функция для поиска студентов по email
function search_students($conn, $email_search) {
    $sql = "SELECT * FROM students WHERE email LIKE '%$email_search%' ORDER BY full_name ASC";
    return $conn->query($sql);
}
?>
