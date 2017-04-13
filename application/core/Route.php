<?php

namespace application\core;


class Route
{
    public static function Start()
    {
        /**
         * Получаем из url controller и actions
         */
        $routes = explode('?', $_SERVER['REQUEST_URI'])[0];
        $routes = explode('/', $routes);

        /**
         * Имя контроллера и екшена по умолчанию
         */
        $controller_name = 'Task';
        $action_name = 'Index';

        /**
         * Получаем имя Сontroller и Action из Url
         */
        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }

        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        /**
         * Добавляем префиксы
         */
        $controller = 'application\\controllers\\' . ucfirst($controller_name) . 'Controller';
        $action = 'action' . ucfirst($action_name);


        /**
         * Подключаем нужный контроллер и екшен, проверяем на возможные ошибки при подключении
         * контроллера и екшена
         */

        if (class_exists($controller)) {

            $model = New $controller;
            $model->id = ucfirst($controller_name);

            if (method_exists($model, $action)) {
                $model->$action();
            }
        }

    }


}


