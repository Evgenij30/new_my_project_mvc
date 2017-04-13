<?php

namespace application\models;

use application\core\Model;

class UserModels extends Model
{
    public $usertable = 'user';

    public function Authorization($login)
    {

        $this->query = "select * from `user` where `login`='$login'";
        $result = mysqli_query($this->link, $this->query);
        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $result;

    }


}