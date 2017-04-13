<h1>Добавить задачу <img src="/web/photo/add-button-md.png" width="50px" id="add_icon_task"></h1>


<div class="form_add_task">
    <form role="form">

        <div class="form-group">
            <label for="text">Имя</label>
            <input type="text" class="form-control" name="name" placeholder="Введите имя">
            <p class="help-block"></p>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Введите email">
            <p class="help-block"></p>
        </div>

        <div class="form-group">
            <label for="email">Задача: </label>
            <textarea class="form-control" placeholder="Message" name="task"> </textarea>
            <p class="help-block"></p>
        </div>

        <div class="input-file-row-1">

            <div class="upload-file-container">
                <img id="image" src="/web/photo/addnewphoto.png" alt=""/>
                <div class="upload-file-container-text">
                    <span>Добавить картинку</span>
                    <input type="file" name="pic[]" class="photo" id="imgInput"/>
                </div>
            </div>

        </div>


    </form>


    <!--Модальное окно-->

    <button id="preview" class="btn btn-info btn-lg" type="button" data-toggle="modal" data-target="#myModal">
        Предварительный просмотр
    </button>
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">×</button>
                    <h2 class="modal-title">Предварительный просмотр задачи</h2>
                </div>
                <div class="modal-body">
                    <p><img id="modal_image" src="#" alt=""></p>
                    <p id="modal_name"></p>
                    <p id="modal_email"></p>
                    <p id="modal_task"></p>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

    <!--Конец модального окна-->

    <button type="button" class="btn btn-success" id="send">Отправить</button>
</div>

<p id="message"></p>

<? foreach ($list_task as $key => $value): ?>

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="thumbnail">

                <div class="caption">
                    <h3>Задача - <?= $value['name'] ?> </h3>
                    <p>Статус задачи <b><?= $value['status'] == 1 ? 'Выполнена' : 'Не выполнена' ?></b></p>
                    <p>Email <?= $value['email'] ?></p>
                    <img src="/web/photo/<?= $value['photo'] ?>" alt="..." ">
                    <hr>
                    <p><?= $value['text'] ?></p>
                </div>
            </div>
        </div>
    </div>
<? endforeach; ?>

<?php
// Находим две ближайшие станицы с обоих краев, если они есть
if ($page - 2 > 0) $page2left = ' <a href= ?page=' . ($page - 2) . '>' . ($page - 2) . '</a>  ';
if ($page - 1 > 0) $page1left = '<a href= ?page=' . ($page - 1) . '>' . ($page - 1) . '</a>  ';
if ($page + 2 <= $total) $page2right = '  <a href= ?page=' . ($page + 2) . '>' . ($page + 2) . '</a>';
if ($page + 1 <= $total) $page1right = '  <a href= ?page=' . ($page + 1) . '>' . ($page + 1) . '</a>';

// Вывод меню
//echo $page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right;

?>
<ul class="pagination">
    <li><?= $page2left ?></li>
    <li><?= $page1left ?></li>
    <li class="active"><a href="#"><?= $page ?></a></li>
    <li><?= $page1right ?></li>
    <li><?= $page2right ?></li>
</ul>