<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление студентами</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h1 class="mb-3"><?= isset($edit_id) ? 'Редактировать студента' : 'Добавить студента'; ?></h1>
    
    <!-- Форма добавления/редактирования -->
    <form action="" method="POST" class="mb-4">
        <input type="hidden" name="edit_id" value="<?= isset($edit_id) ? $edit_id : ''; ?>"> <!-- Скрытое поле для edit_id -->
        
        <div class="mb-3">
            <label for="full_name" class="form-label">ФИО:</label>
            <input type="text" id="full_name" name="full_name" class="form-control" required 
                value="<?= isset($edit_full_name) ? $edit_full_name : ''; ?>"> <!-- Заполняем старое значение ФИО -->
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required 
                value="<?= isset($edit_email) ? $edit_email : ''; ?>"> <!-- Заполняем старое значение email -->
        </div>
        
        <div class="mb-3">
            <label for="group_name" class="form-label">Группа:</label>
            <input type="text" id="group_name" name="group_name" class="form-control" required 
                value="<?= isset($edit_group_name) ? $edit_group_name : ''; ?>"> <!-- Заполняем старое значение группы -->
        </div>
        
        <button type="submit" name="<?= isset($edit_id) ? 'edit_student' : 'add_student'; ?>" class="btn btn-primary">
            <?= isset($edit_id) ? 'Сохранить изменения' : 'Добавить'; ?>
        </button>
    </form>

    <!-- Кнопка для перехода к добавлению студента -->
    <?php if (isset($edit_id)): ?>
        <a href="index.php" class="btn btn-secondary">Вернуться на главное</a>
    <?php endif; ?>

    <!-- Форма поиска студентов -->
    <h1 class="mb-3">Поиск студента по Email</h1>
    <form action="" method="GET" class="mb-4">
        <div class="mb-3">
            <label for="email_search" class="form-label">Введите Email:</label>
            <input type="email" id="email_search" name="email_search" value="<?= htmlspecialchars($email_search); ?>" class="form-control">
        </div>
        <button type="submit" class="btn btn-secondary">Поиск</button>
    </form>

    <!-- Вывод сообщений об ошибках и успехе -->
    <?php if ($error_message) { echo "<p class='text-danger'>$error_message</p>"; } ?>
    <?php if ($success_message) { echo "<p class='text-success'>$success_message</p>"; } ?>

    <!-- Список студентов -->
    <h1 class="mb-3">Список студентов</h1>
    <table class="table table-striped table-bordered">
        <thead class="table-primary">
        <tr>
            <th>ФИО</th>
            <th>Email</th>
            <th>Группа</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($students_result->num_rows > 0) {
            while ($row = $students_result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['full_name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['group_name']}</td>
                        <td>
                            <a href='?edit_id={$row['id']}' class='btn btn-warning btn-sm'>Редактировать</a>
                            <form action='' method='POST' style='display:inline-block;' onsubmit='return confirm(\"Вы уверены, что хотите удалить этого студента?\");'>
                                <input type='hidden' name='delete_student_id' value='{$row['id']}'>
                                <button type='submit' class='btn btn-danger btn-sm'>Удалить</button>
                            </form>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Нет записей.</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
