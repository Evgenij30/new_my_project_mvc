<?php

namespace application\core;


class View
{

    public $baseDir = VIEW_DIR;


    /**
     * @var string имя текущей директории с вьюхами
     */
    private $current;


    public function render($layout, $view, $params)
    {
        ob_start();
        extract($params);
        include $this->getFullPath() . DS . $view;
        $content = ob_get_clean();
        include $this->baseDir . DS . 'layouts' . DS . $layout;
    }

    /**
     * @return string полный путь к папке с вьхами
     */
    protected function getFullPath()
    {

        return $this->baseDir . DS . $this->current;
    }

    public function setCurrentFolder($currentFolder)
    {
        $this->current = $currentFolder;
    }
}