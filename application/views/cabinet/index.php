<h2>Кабинет админа</h2>

<? foreach ($list_task as $key => $value): ?>

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="thumbnail">

                <div class="caption">
                    <h3><a href="/cabinet/edit?id=<?= $value['id'] ?>"><img src="/web/photo/edit.png"
                                                                            title="Редактировать"></a>Задача
                        - <?= $value['name'] ?>  </h3>
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