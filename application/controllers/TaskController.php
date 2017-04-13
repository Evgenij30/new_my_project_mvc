<?php

namespace application\controllers;

use application\Core\Controller;
use application\models\TaskModels;


class TaskController extends Controller
{

    public function actionIndex()
    {

        $model = new TaskModels();
        $list_task = $model->SelectAll();

        $page = $model->page;
        $total = $model->total;

        $this->render('index.php', compact('list_task', 'page', 'total'));
    }

    public function actionAddTask()
    {

        if (isset($_FILES['img']) && $_POST['name'] && $_POST['email'] && $_POST['task']) {

            if ($this->ImageLoading()) {

                $model = new TaskModels();
                $name = strip_tags($_POST['name']);
                $email = strip_tags($_POST['email']);
                $task = strip_tags($_POST['task']);
                $photo = $_FILES['img']['name'];

                $result = $model->create(['`name`,`email`,`text`,`photo`'], ["'$name','$email','$task','$photo'"]);

                if ($result) {
                    print json_encode(['result' => 'true', 'message' => 'Удачно создана!!']);

                }
            }

        } else {
            print json_encode(['result' => 'false', 'message' => 'Ошибка заполните все поля и прикрепите изображение']);
        }

    }

    public function ImageLoading()
    {

        if ($_FILES['img']['type'] == 'image/jpeg' || $_FILES['img']['type'] == 'image/png'
            || $_FILES['img']['type'] == 'image/gif'
        ) {

            $tmp_name = $_FILES['img']['tmp_name'];
        } else {
            print json_encode(['result' => 'false', 'message' => 'Неверный формат изображения']);
        }

        /**
         * Проверяем если изображения подходящего формата создаем переменную с нашим файлом и сохраняем его
         *
         */

        if (isset($tmp_name)) {

            list($w_i, $h_i) = getimagesize($tmp_name);
            if ($w_i < 320 || $h_i < 240) {

                if (!copy($tmp_name, DIR_PHOTO . $_FILES['img']['name'])) {
                    print json_encode(['result' => 'false', 'message' => 'Ошибка при загрузке изображения']);
                } else {
                    return true;
                }

            } else {
                if (!$this->resize($tmp_name, DIR_PHOTO . $_FILES['img']['name'], 320, 240)) {
                    print json_encode(['result' => 'false', 'message' => 'Ошибка при изменению размера изображения']);
                } else {
                    return true;
                }
            }
        }


    }

    /**
     * @param $file_input
     * @param $file_output
     * @param $w_o
     * @param $h_o
     * @param bool $percent
     * @return bool|string
     * Функция маштабирование размер 320*240px
     */
    public function resize($file_input, $file_output, $w_o, $h_o, $percent = false)
    {
        list($w_i, $h_i, $type) = getimagesize($file_input);
        if (!$w_i || !$h_i) {
            return 'Невозможно получить длину и ширину изображения';
        }

        $types = array('', 'gif', 'jpeg', 'png');
        $ext = $types[$type];
        if ($ext) {
            $func = 'imagecreatefrom' . $ext;
            $img = $func($file_input);
        } else {
            return 'Некорректный формат файла';
        }

        if ($percent) {
            $w_o *= $w_i / 100;
            $h_o *= $h_i / 100;
        }

        if (!$h_o) $h_o = $w_o / ($w_i / $h_i);
        if (!$w_o) $w_o = $h_o / ($h_i / $w_i);

        $img_o = imagecreatetruecolor($w_o, $h_o);
        imagecopyresampled($img_o, $img, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i);

        if ($type == 2) {
            return imagejpeg($img_o, $file_output, 100);
        } else {
            $func = 'image' . $ext;

            return $func($img_o, $file_output);
        }
    }

}