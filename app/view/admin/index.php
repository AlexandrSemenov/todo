<!DOCTYPE html>
<html lang="ru">
<head>
    <base href="/">
    <meta charset="utf-8" />
    <title>Все задания</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
</head>
<body>
<?php include_once('../app/view/layout/navbar.php') ?>
<div class="container">
    <div class="col-md-12" style="margin-top: 75px;">
        <div class="all-task-section">
            <h4>Все задания (админ)</h4>
            <table class="table table-striped">
                <tr style="text-align: center">
                    <th width="15%">Автор
                        <a href="/admin/orderby/name/desc" style="color: #333333;"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i>
                        </a> <a href="/admin/orderby/name/asc" style="color: #333333;"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                    </th>
                    <th width="10%">Email
                        <a href="/admin/orderby/email/desc" style="color: #333333;"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i>
                        </a> <a href="/admin/orderby/email/asc" style="color: #333333;"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                    </th>
                    <th width="25%">Задача</th>
                    <th width="15%">Изображение</th>
                    <th width="30%">Статус выполнения
                        <a href="/admin/orderby/done/desc" style="color: #333333;"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i>
                        </a> <a href="/admin/orderby/done/asc" style="color: #333333;"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                    </th>
                    <th>Редакитровать</th>
                    <th>Удалить</th>
                </tr>
                <? foreach($data['tasks'] as $task):?>
                    <tr>
                        <td><?= $task['name'] ?></td>
                        <td><?= $task['email'] ?></td>
                        <td><?= $task['description'] ?></td>
                        <td><img class="img-responsive" src="<?= $task['image_path'] ?>" alt="image"></td>
                        <td><?= $task['done']? 'задача выполнена': 'задача не выполнена' ?></td>
                        <td><a href="task/edit/<?= $task['id']?>">Редактировать</a></td>
                        <td><a class="btn btn-danger" href="task/delete/<?= $task['id']?>">Удалить</a></td>
                    </tr>
                <? endforeach; ?>
            </table>
        </div>
    </div>
</div>

<script src="/assets/js/bootstrap.js"></script>
</body>
</html>