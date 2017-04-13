<?php

namespace application\models;

use application\core\Model;

class TaskModels extends Model
{
    public $tasktable = 'task';
    public $page;
    public $total;

    public function Create($name = array(), $value = array())
    {

        $this->query = 'INSERT INTO  `' . $this->tasktable . '` (' . $name[0] . ' ) VALUES (' . $value[0] . ' )';
        $result = mysqli_query($this->link, $this->query);

        if ($result) {
            return true;
        }

    }

    public function SelectAll()
    {


        /**
         * Постраничная навинация
         */
        $num = 3;

        $this->page = $_GET['page'];

        $this->query = 'SELECT COUNT(*) FROM`' . $this->tasktable . '`';
        $result = mysqli_query($this->link, $this->query);
        $posts = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $this->total = intval(((int)$posts["COUNT(*)"] - 1) / $num) + 1;

        $this->page = intval($this->page);


        if (empty($this->page) or $this->page < 0) $this->page = 1;

        if ($this->page > $this->total) $this->page = $this->total;

        $start = $this->page * $num - $num;


        $all_task = array();
        $this->query = "select * from `task` LIMIT $start, $num";
        $query = mysqli_query($this->link, $this->query);

        while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $all_task[] = array(
                'id' => $result['id'],
                'name' => $result['name'],
                'email' => $result['email'],
                'text' => $result['text'],
                'photo' => $result['photo'],
                'status' => $result['status'],
            );
        }
        return $all_task;
    }

    public function TaskOne($id)
    {

        $this->query = "select * from `task` where `id`='$id'";
        $result = mysqli_query($this->link, $this->query);
        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $result;

    }

    public function TaskUpdate($id = 0, $value = array())
    {

        $this->query = "UPDATE `task` SET $value[0] WHERE `id`=$id";
        $result = mysqli_query($this->link, $this->query);

        if ($result) {
            return true;
        }
    }


}