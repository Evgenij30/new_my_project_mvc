<?php

namespace application\controllers;

use application\Core\Controller;
use application\models\TaskModels;
use application\models\UserModels;

class CabinetController extends Controller
{
    public function actionIndex()
    {
        $model = new TaskModels();
        $list_task = $model->SelectAll();

        if (!$_COOKIE['user']) {

            header('Location: /cabinet/login');
        }

        $this->render('index.php', compact('list_task'));

    }

    public function actionlogin()
    {

        $model = new UserModels();


        if ($user = $model->Authorization($_POST['login'])) {

            /**
             * в связи с отсутствием регистрации использую более простой способ шифрования пароля md5
             */
            if (md5($_POST['password']) == $user['password']) {
                if (setcookie('user', $user['name'], time() + 3600)) {
                    header('Location: /cabinet');
                }
            } else {
                echo "Ошибка неверный пароль";
            }
        }


        $this->render('login.php');
    }

    public function actionEdit()
    {

        $id = strip_tags($_GET['id']);

        $model = new TaskModels();
        $taskedit = $model->TaskOne($id);

        $this->render('edit.php', compact('taskedit'));
    }

    public function actionTaskUpdate()
    {
        $model = new TaskModels();


        $id = strip_tags($_POST['id']);
        $name = strip_tags($_POST['name']);
        $email = strip_tags($_POST['email']);
        $text = strip_tags($_POST['task']);
        $status = strip_tags($_POST['status']);


        if ($model->TaskUpdate($id, [" `name` = '$name',`email` = '$email',`text` = '$text',`status` = '$status'"])) {
            header('Location: /cabinet/edit?id=' . $id);
        }

    }

}