<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <title>Добавить задание</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>

<?php include_once('../app/view/layout/navbar.php') ?>
<div class="container">
    <div class="col-md-offset-4 col-md-4" style="margin-top: 100px;">
        <div class="add-task-section">
            <h4>Добавить задание</h4>
            <form action="/task/save" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input id="name" class="form-control" type="text" name="name" placeholder="Имя" required>
                </div>
                <div class="form-group">
                    <input id="email" class="form-control" type="text" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <textarea id="description" class="form-control" type="text" name="description" placeholder="Описние задачи" style="resize: none;" required></textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="image" onchange="previewFile()" accept="image/jpeg,image/png,image/gif">
                </div>
                <div id="preview" class="btn btn-info">Посмотреть</div>
                <input class="btn btn-primary" type="submit" value="Добавить">
            </form>
        </div>
    </div>
</div>

<div class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Предпросмотр задачи</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <tr style="text-align: center">
                        <th width="15%">Автор</th>
                        <th width="20%">Email</th>
                        <th width="25%">Задача</th>
                        <th width="15%">Изображение</th>
                    </tr>
                        <tr class = "modal-tr">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><img class="img-responsive" id="previewImage" src="" alt=""></td>
                        </tr>
                </table>
            </div>

        </div>
    </div>
</div>

<script src="/assets/js/jquery-1.11.2.min.js"></script>
<script src="/assets/js/bootstrap.js"></script>
<script src="/assets/js/main.js"></script>

<script>
    function previewFile(){
        var preview = document.querySelector('#previewImage');
        var file = document.querySelector('input[type=file]').files[0];
        var reader  = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
</script>
</body>
</html>