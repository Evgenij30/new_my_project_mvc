<?php

namespace application\core;


class Model
{
    public $link;
    public $query;


    public function __construct()
    {

        $this->link = mysqli_connect(HOST, HOST_LOGIN, HOST_PASSWD, HOST_BASE);

        if (!$this->link) {
            echo "Нет соедениение с базой данных";
            die();
        }
    }


}


