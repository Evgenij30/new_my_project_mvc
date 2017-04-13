<form role="form" action="taskupdate" method="POST">

    <div class="form-group">
        <label for="text">Имя</label>
        <input type="text" class="form-control" name="name" value="<?= $taskedit['name'] ?>">
        <p class="help-block"></p>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" value="<?= $taskedit['email'] ?>">
        <p class="help-block"></p>
    </div>

    <div class="form-group">
        <label for="email">Задача: </label>
        <textarea class="form-control" value="Message" name="task"><?= $taskedit['name'] ?> </textarea>
        <p class="help-block"></p>
    </div>

    <div class="form-group">
        <label for="sel1">Статус задачи</label>
        <select class="form-control" id="sel1" name="status">
            <option value="0" <?= $taskedit['status'] == 0 ? 'selected ' : '' ?> >Не выполнено</option>
            <option value="1" <?= $taskedit['status'] == 1 ? 'selected ' : '' ?>>Выполнено</option>

        </select>
    </div>
    <input type="hidden" name="id" value="<?= $taskedit['id'] ?>">
    <button type="submit" class="btn btn-success">Редактировать</button>

</form>
