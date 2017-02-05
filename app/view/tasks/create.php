<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <title>Добавить задание</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
</head>
<body>
<?php include_once('../app/view/layout/navbar.php') ?>
<div class="container">
    <div class="col-md-offset-4 col-md-4" style="margin-top: 100px;">
        <div class="add-task-section">
            <h4>Добавить задание</h4>
            <form action="/task/save" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input class="form-control" type="text" name="name" placeholder="Имя" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" type="text" name="description" placeholder="Описние задачи" style="resize: none;" required></textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="image" accept="image/jpeg,image/png,image/gif">
                </div>
                <input class="btn btn-primary btn-block" type="submit" value="Добавить">
            </form>
        </div>
    </div>
</div>

<script src="/assets/js/bootstrap.js"></script>
</body>
</html>