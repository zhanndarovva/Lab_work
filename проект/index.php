<?php
require_once "logic.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>CRUD PDO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<div class="container">
    <h2 class="mb-4">Добавить студента</h2>

    <!-- Форма добавления -->
    <form method="post" class="row g-3 mb-4">
        <div class="col-md-3">
            <input type="text" name="name" class="form-control" placeholder="Имя" required>
        </div>
        <div class="col-md-3">
            <input type="date" name="date_of_birth" class="form-control" placeholder="Дата рождения" required>
        </div>
        <div class="col-md-2">
            <input type="text" name="group_name" class="form-control" placeholder="Группа" required>
        </div>
        <div class="col-md-2">
            <input type="text" name="specialty" class="form-control" placeholder="Специальность" required>
        </div>
        <div class="col-md-2">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="col-md-12 mt-2">
            <button name="create" class="btn btn-primary">Создать</button>
        </div>
    </form>

    <h3 class="mb-3">Список студентов</h3>

    <!-- Таблица студентов -->
    <table class="table table-bordered table-striped">
        <tr>
            <th>ID</th><th>Имя</th><th>Возраст</th><th>Группа</th><th>Специальность</th><th>Email</th><th>Действия</th>
        </tr>

        <?php foreach ($students as $s): ?>
            <tr>
                <td><?= $s['id'] ?></td>
                <td><?= htmlspecialchars($s['name']) ?></td>
                <td><?= calculateAge($s['date_of_birth']) ?></td>
                <td><?= htmlspecialchars($s['group_name']) ?></td>
                <td><?= htmlspecialchars($s['specialty']) ?></td>
                <td><?= htmlspecialchars($s['email']) ?></td>
                <td>
                    <a href="?edit=<?= $s['id'] ?>" class="btn btn-sm btn-warning">Редактировать</a>
                    <a href="?delete=<?= $s['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Удалить?')">Удалить</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Форма редактирования -->
    <?php if ($editStudent): ?>
        <h3 class="mt-5">Редактировать студента</h3>

        <form method="post" class="row g-3 mb-5">
            <input type="hidden" name="id" value="<?= $editStudent['id'] ?>">

            <div class="col-md-3">
                <input type="text" name="name" value="<?= htmlspecialchars($editStudent['name']) ?>" class="form-control" required>
            </div>
            <div class="col-md-3">
                <input type="date" name="date_of_birth" value="<?= $editStudent['date_of_birth'] ?>" class="form-control" required>
            </div>
            <div class="col-md-2">
                <input type="text" name="group_name" value="<?= htmlspecialchars($editStudent['group_name']) ?>" class="form-control" required>
            </div>
            <div class="col-md-2">
                <input type="text" name="specialty" value="<?= htmlspecialchars($editStudent['specialty']) ?>" class="form-control" required>
            </div>
            <div class="col-md-2">
                <input type="email" name="email" value="<?= htmlspecialchars($editStudent['email']) ?>" class="form-control" required>
            </div>
            <div class="col-md-12 mt-2">
                <button name="update" class="btn btn-success">Обновить</button>
            </div>
        </form>
    <?php endif; ?>

</div>
</body>
</html>
