<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <title>Логин</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
</head>
<body>
<?php include_once('../app/view/layout/navbar.php') ?>
<div class="container">
    <div class="col-md-offset-4 col-md-4" style="margin-top: 100px; text-align: center;">
        <div class="add-task-section">
            <h4>Введите логин и пароль</h4>
            <?= !empty($_SESSION['error']) ? "<div class='alert alert-warning'>".$_SESSION['error']."</div>" : ""; unset($_SESSION['error']) ?>

            <form action="/login/auth" method="post">
                <div class="form-group">
                    <input class="form-control" type="text" name="login" placeholder="Логин" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Пароль" required>
                </div>
                <input class="btn btn-primary btn-block" type="submit" value="Войти">
            </form>
        </div>
    </div>
</div>

<script src="/assets/js/bootstrap.js"></script>
</body>
</html>