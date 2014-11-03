<?php
class View {
    private $template;
    private $viewData;

    public function __construct($template, array $viewData)
    {
        $this->setTemplate($template);
        $this->viewData = $viewData;
    }

    public function setTemplate($template)
    {
        if (file_exists($template)) {
            $this->template = $template;
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