<?php

include 'config\aliases.php';
include_once 'config\db.php';


spl_autoload_register(function ($className) {

    $file = $className . '.php';

    if (stream_resolve_include_path($file) === false)
        header('Location: /error/404 ');

    require_once $file;

});

\application\core\Route::Start();