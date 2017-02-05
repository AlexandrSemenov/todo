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
    <div class="col-md-offset-4 col-md-4" style="margin-top: 100px; text-align: center;">
        <div class="add-task-section">
            <h4>Добавить задание</h4>
            <form action="/task/update/<?= $data['task'][0]['id'] ?>" method="post">
                <div class="form-group">
                    <input class="form-control" type="text" value="<?= $data['task'][0]['name'] ?>" name="name" placeholder="Имя" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" value="<?= $data['task'][0]['email'] ?>" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" type="text" name="description" placeholder="Описние задачи" style="resize: none;" required><?= $data['task'][0]['description'] ?></textarea>
                </div>
                <div class="checkbox" style="text-align: left;">
                    <label>
                        <input type="checkbox" name="done" <?= $data['task'][0]['done'] == true ? 'checked="checked"': '' ?> > Выполнено
                    </label>
                </div>
                <input class="btn btn-primary btn-block" type="submit" value="Изменить">
            </form>
        </div>
    </div>
</div>

<script src="/assets/js/bootstrap.js"></script>
</body>
</html>