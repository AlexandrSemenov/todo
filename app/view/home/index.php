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
                <h4>Все задания</h4>
                <table class="table table-striped">
                    <tr style="text-align: center">
                        <th width="15%">Автор
                            <a href="/orderby/name/desc" style="color: #333333;"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i>
                            </a> <a href="/orderby/name/asc" style="color: #333333;"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                        </th>
                        <th width="20%">Email
                            <a href="/orderby/email/desc" style="color: #333333;"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i>
                            </a> <a href="/orderby/email/asc" style="color: #333333;"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                        </th>
                        <th width="25%">Задача</th>
                        <th width="15%">Изображение</th>
                        <th width="20%">Статус выполнения
                            <a href="/orderby/done/desc" style="color: #333333;"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i>
                            </a> <a href="/orderby/done/asc" style="color: #333333;"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                        </th>
                    </tr>
                    <? foreach($data['tasks'] as $task):?>
                        <tr>
                            <td><?= $task['name'] ?></td>
                            <td><?= $task['email'] ?></td>
                            <td><?= $task['description'] ?></td>
                            <td><img class="img-responsive" src="<?= $task['image_path'] ?>" alt="image"></td>
                            <td><?= $task['done']? 'задача выполнена': 'задача не выполнена' ?></td>
                        </tr>
                    <? endforeach; ?>
                </table>
            </div>
        </div>
    </div>

    <script src="/assets/js/bootstrap.js"></script>
</body>
</html>