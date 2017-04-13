<?php

namespace application\Core;

class Controller
{

    public $id;

    public $layout = 'main.php';

    /**
     * @var View
     */
    public $view;


    /**
     *
     * @param string $view имя файда вьюхи
     * @param array $params набор параметров для файла вьюхи
     */
    public function render($view, $params = [])
    {

        $this->getView($this->id)->render($this->layout, $view, $params);
    }

    public function setView(View $view)
    {
        $this->view = $view;
    }

    protected function getView($currentFolder = null)
    {
        if (!$this->view) {
            $this->view = new View();
        }
        $this->view->setCurrentFolder($currentFolder);

        return $this->view;

    }

}