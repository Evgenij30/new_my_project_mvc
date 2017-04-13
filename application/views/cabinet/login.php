<h2>Авторизация</h2>
<?= $_COOKIE["user"];
?>
<div class="form">
    <form class="form-horizontal" role="form" method="POST" action="/cabinet/login">
        <div class="form-group">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Логин" name="login">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Пароль" name="password">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default btn-sm">Войти</button>
            </div>
        </div>
    </form>
</div><!-- form  -->