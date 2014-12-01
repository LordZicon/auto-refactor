<?php
class View
{
    static public $directory;
    private $template;
    private $viewData;

    public function __construct($template, array $viewData)
    {
        $this->setTemplate($template);
        $this->viewData = $viewData;
    }

    static public function setDirectory($path)
    {
        self::$directory = $path;
    }

    public function setTemplate($template)
    {
        $path = self::$directory . '/' . $template;

        if (file_exists($path)) {
            $this->template = $path;
        } else {
            throw new Exception("View file '$template' not found");
        }
    }

    public function render()
    {
        extract($this->viewData);

        ob_start();
        include($this->template);
        
        return ob_get_clean();
    }

    public function __toString()
    {
        return $this->render();
    }

}