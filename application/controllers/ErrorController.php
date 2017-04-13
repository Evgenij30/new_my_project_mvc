<?php

namespace application\controllers;

use application\Core\Controller;

class ErrorController extends Controller
{

    public function action404()
    {
        $this->render('404.php');
    }

}